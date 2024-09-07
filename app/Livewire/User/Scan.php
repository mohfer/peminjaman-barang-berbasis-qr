<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Borrow;
use App\Models\History;
use App\Models\Returns;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Scan extends Component
{
    public $title = 'Scan QR Code';

    public $userId, $item, $itemId, $borrow, $qtyBorrow, $qtyReturn, $final;

    public function onQrCodeScanned($token)
    {
        $this->userId = Auth::user()->id;
        $lastSegment = basename($token);

        if ($token !== route('borrow', $lastSegment) && $token !== route('return', $lastSegment)) {
            return redirect()->route('scan')->with('error', 'Invalid QR Code');
        }

        $this->item = Item::where('token', $lastSegment)->first();
        if (!$this->item) {
            return redirect()->route('scan')->with('error', 'Item not found');
        }

        $this->itemId = $this->item->id;

        $this->borrow = Borrow::where('item_id', $this->itemId)
            ->where('user_id', $this->userId)
            ->orderBy('time', 'desc')
            ->value('id');

        $this->qtyBorrow = Borrow::where('item_id', $this->itemId)
            ->where('user_id', $this->userId)
            ->sum('qty');

        $this->qtyReturn = Returns::whereIn('borrow_id', Borrow::where('item_id', $this->itemId)->pluck('id'))
            ->where('user_id', $this->userId)
            ->sum('qty');

        $this->final = $this->qtyBorrow - $this->qtyReturn;

        if ($token === route('borrow', $lastSegment)) {
            if ($this->item->qty <= 0) {
                return redirect()->route('scan')->with('error', 'Item not available');
            } else if ($this->item->qty == 1) {
                Borrow::create([
                    'item_id' => $this->item->id,
                    'user_id' => $this->userId,
                    'qty' => 1,
                    'time' => Carbon::now(),
                ]);

                History::create([
                    'item_id' => $this->item->id,
                    'user_id' => $this->userId,
                    'qty' => 1,
                    'time' => Carbon::now(),
                    'status' => 'Borrowed',
                ]);

                $this->item->qty -= 1;
                $this->item->save();

                return redirect()->route('dashboard')->with('success', 'Item borrowed successfully!');
            } else {
                return redirect()->route('borrow', $lastSegment);
            }
        } else if ($token === route('return', $lastSegment)) {
            if ($this->final <= 0) {
                return redirect()->route('scan')->with('error', 'Item not borrowed or already returned');
            } else if ($this->final == 1) {
                Returns::create([
                    'borrow_id' => $this->borrow,
                    'user_id' => $this->userId,
                    'qty' => 1,
                    'time' => Carbon::now(),
                ]);

                History::create([
                    'item_id' => $this->item->id,
                    'user_id' => $this->userId,
                    'qty' => 1,
                    'time' => Carbon::now(),
                    'status' => 'Returned',
                ]);

                $this->item->qty += 1;
                $this->item->save();

                return redirect()->route('dashboard')->with('success', 'Item returned successfully!');
            } else {
                return redirect()->route('return', $lastSegment);
            }
        }
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.user.scan');
    }
}
