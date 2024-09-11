<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\History;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow as ModelsBorrow;

class Borrow extends Component
{
    public $title = 'Borrow Item';

    public $item;
    public $image, $code, $name, $type, $qtyItem;

    #[Validate('required|numeric|min:1')]
    public $qty = 1;

    public function mount($token)
    {
        $this->item = Item::where('token', $token)->firstOrFail();
        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->type = $this->item->type;
        $this->qtyItem = $this->item->qty;
        $this->image = $this->item->image;

        if ($this->qtyItem <= 0) {
            redirect()->route('dashboard')->with('error', 'Item not available!');
        }
    }

    public function borrow()
    {
        if ($this->qty > $this->qtyItem) {
            $this->dispatch('showToast', 'Quantity not enough!', 'error');
            return;
        }

        if ($this->qty <= 0) {
            return;
        }

        ModelsBorrow::create([
            'item_id' => $this->item->id,
            'user_id' => Auth::user()->id,
            'qty' => $this->qty,
            'time' => Carbon::now(),
        ]);

        History::create([
            'item_id' => $this->item->id,
            'user_id' => Auth::user()->id,
            'qty' => $this->qty,
            'time' => Carbon::now(),
            'status' => 'Borrowed',
        ]);

        $this->item->qty -= $this->qty;
        $this->item->save();

        return redirect()->route('dashboard')->with('success', 'Item borrowed successfully!');
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.user.borrow');
    }
}
