<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use App\Models\Borrow;
use App\Models\History;
use App\Models\Returns;
use Livewire\Component;

class Detail extends Component
{

    public $title = 'User Detail';

    public $image, $token, $userId, $nim, $name, $gender, $fakultas, $prodi, $phone, $email, $role, $allZero, $startDate, $endDate;

    public function mount($token)
    {
        $user = User::where('token', $token)->first();
        $this->userId = $user->id;
        $this->nim = $user->nim;
        $this->name = $user->name;
        $this->gender = $user->gender;
        $this->fakultas = $user->fakultas;
        $this->prodi = $user->prodi;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->image = $user->image;
    }

    public function render()
    {
        $borrowedItems = Borrow::where('user_id', $this->userId)
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

        $query = History::query();

        $query->where('user_id', $this->userId)->with('item');

        if (!$this->startDate && !$this->endDate) {
            $this->startDate = $this->endDate = \Carbon\Carbon::today()->toDateString();
        }

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('time', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59']);
        }

        $histories = $query->orderBy('time', 'desc')->get();

        view()->share('title', $this->title);
        return view('livewire.admin.user.detail', [
            'stillBorrowedItems' => $stillBorrowedItems,
            'histories' => $histories
        ]);
    }
}
