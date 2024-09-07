<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Borrow;
use App\Models\Returns;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    use WithPagination;

    public $title = 'Status';

    public $search = '';

    public $allZero;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;

        $borrowedItems = Borrow::with('item', 'user')
            ->when($userRole !== 'admin', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->whereHas('item', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('type', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhereHas('user', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('nim', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
            })
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

                    if ($userRole == 'admin') {
                        $stillBorrowedItems[$itemName]['borrower_name'] = $borrow->user->name;
                        $stillBorrowedItems[$itemName]['nim'] = $borrow->user->nim;
                        $stillBorrowedItems[$itemName]['phone'] = $borrow->user->phone;
                        $stillBorrowedItems[$itemName]['token'] = $borrow->user->token;
                    }
                }
            }
        }

        ksort($stillBorrowedItems);

        $this->allZero = count($stillBorrowedItems) === 0;

        view()->share('title', $this->title);
        return view('livewire.status', [
            'stillBorrowedItems' => $stillBorrowedItems,
        ]);
    }
}
