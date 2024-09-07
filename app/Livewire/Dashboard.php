<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Borrow;
use App\Models\History;
use App\Models\Returns;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $title = 'Dashboard';

    public $users, $items, $stock, $stillBorrowed, $borrowed, $returned, $history, $allZero;

    public function mount()
    {
        $userId = Auth::user()->id;
        $this->users = User::count();
        $this->items = Item::count();
        $this->stock = Item::orderBy('qty', 'asc')->limit(3)->get();

        $borrowedItems = Borrow::with('item')->get();

        $stillBorrowedItems = [];

        foreach ($borrowedItems as $borrow) {
            $qtyBorrow = $borrow->qty;

            $qtyReturn = Returns::where('borrow_id', $borrow->id)
                ->sum('qty');

            $finalQty = $qtyBorrow - $qtyReturn;

            if ($finalQty > 0) {
                $key = $borrow->item->id . '-' . $borrow->user_id;

                if (isset($stillBorrowedItems[$key])) {
                    $stillBorrowedItems[$key]['final'] += $finalQty;
                } else {
                    $stillBorrowedItems[$key] = [
                        'item' => $borrow->item,
                        'user_id' => $borrow->user_id,
                        'final' => $finalQty,
                    ];
                }
            }
        }

        $this->stillBorrowed = count($stillBorrowedItems);

        $this->borrowed = History::whereDate('time', Carbon::today())->where('status', 'Borrowed')->count();

        $this->returned = History::whereDate('time', Carbon::today())->where('status', 'Returned')->count();
    }

    public function render()
    {
        $userId = Auth::user()->id;

        $borrowedItems = Borrow::where('user_id', $userId)
            ->with('item')
            ->get();

        $stillBorrowedItems = [];

        foreach ($borrowedItems as $borrow) {
            $qtyBorrow = $borrow->qty;
            $qtyReturn = Returns::where('borrow_id', $borrow->id)->sum('qty');
            $finalQty = $qtyBorrow - $qtyReturn;

            if ($finalQty > 0) {
                $itemName = $borrow->item->name;

                if (isset($stillBorrowedItems[$itemName])) {
                    $stillBorrowedItems[$itemName]['final'] += $finalQty;
                } else {
                    $stillBorrowedItems[$itemName] = [
                        'item' => $borrow->item,
                        'final' => $finalQty,
                    ];
                }
            }
        }

        $this->allZero = count($stillBorrowedItems) === 0;

        view()->share('title', $this->title);
        return view('livewire.dashboard', [
            'histories' => $this->history,
            'stillBorrowedItems' => $stillBorrowedItems,
        ]);
    }
}
