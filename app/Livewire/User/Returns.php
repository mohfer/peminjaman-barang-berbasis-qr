<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Borrow;
use App\Models\History;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\Returns as ModelsReturns;

class Returns extends Component
{
    public $title = 'Return Item';

    public $userId, $item, $itemId, $borrow;
    public $image, $code, $name, $type, $qtyBorrow, $qtyReturn, $final;

    #[Validate('required|numeric|min:1')]
    public $qty = 1;

    public function mount($token)
    {
        $this->userId = Auth::user()->id;
        $this->item = Item::where('token', $token)->first();
        $this->image = $this->item->image;

        if (!$this->item) {
            $this->dispatch('showToast', 'Item not found!', 'error');
            return redirect()->route('dashboard');
        }

        $this->itemId = $this->item->id;

        $this->borrow = Borrow::where('item_id', $this->itemId)
            ->where('user_id', $this->userId)
            ->orderBy('time', 'desc')
            ->value('id');

        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->type = $this->item->type;

        $this->qtyBorrow = Borrow::where('item_id', $this->itemId)
            ->where('user_id', $this->userId)
            ->sum('qty');

        $this->qtyReturn = ModelsReturns::whereIn('borrow_id', Borrow::where('item_id', $this->itemId)->pluck('id'))
            ->where('user_id', $this->userId)
            ->sum('qty');

        $this->final = $this->qtyBorrow - $this->qtyReturn;

        if ($this->final <= 0) {
            redirect()->route('dashboard')->with('error', 'Item not borrowed or already returned');
        }
    }

    public function return()
    {
        $remainingQty = $this->qty;

        if ($this->final <= 0) {
            $this->dispatch('showToast', 'Item already returned!', 'error');
            return;
        }

        if ($this->qty > $this->final) {
            $this->dispatch('showToast', 'Quantity not enough!', 'error');
            return;
        }

        $borrowedItems = Borrow::where('item_id', $this->itemId)
            ->where('user_id', $this->userId)
            ->whereRaw('qty > (SELECT COALESCE(SUM(qty), 0) FROM returns WHERE returns.borrow_id = borrows.id)')
            ->orderBy('time', 'asc')
            ->get();

        foreach ($borrowedItems as $borrow) {
            $returnedQty = ModelsReturns::where('borrow_id', $borrow->id)->sum('qty');
            $borrowableQty = $borrow->qty - $returnedQty;

            if ($remainingQty <= $borrowableQty) {
                ModelsReturns::create([
                    'borrow_id' => $borrow->id,
                    'user_id' => $this->userId,
                    'qty' => $remainingQty,
                    'time' => Carbon::now(),
                ]);

                $this->item->qty += $remainingQty;
                $this->item->save();
                break;
            } else {
                ModelsReturns::create([
                    'borrow_id' => $borrow->id,
                    'user_id' => $this->userId,
                    'qty' => $borrowableQty,
                    'time' => Carbon::now(),
                ]);

                $this->item->qty += $borrowableQty;
                $this->item->save();
                $remainingQty -= $borrowableQty;
            }
        }

        History::create([
            'item_id' => $this->itemId,
            'user_id' => $this->userId,
            'qty' => $this->qty,
            'time' => Carbon::now(),
            'status' => 'Returned',
        ]);

        if ($remainingQty > 0) {
            return redirect()->route('dashboard')->with('success', 'Item returned successfully!');
        } else {
            $this->dispatch('showToast', 'Quantity not enough!', 'error');
        }
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.user.returns');
    }
}
