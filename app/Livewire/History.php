<?php

namespace App\Livewire;

use App\Models\History as ModelsHistory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class History extends Component
{
    use WithPagination;

    public $title = 'Histories';

    public $startDate;
    public $endDate;

    public function updatedStartDate()
    {
        $this->resetPage();
    }

    public function updatedEndDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userId = Auth::user()->id;
        $role = Auth::user()->role;

        $query = ModelsHistory::query();

        if ($role === 'admin') {
            $query->with('item', 'user');
        } else {
            $query->where('user_id', $userId)->with('item');
        }

        if (!$this->startDate && !$this->endDate) {
            $this->startDate = $this->endDate = \Carbon\Carbon::today()->toDateString();
        }

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('time', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59']);
        }

        $histories = $query->orderBy('time', 'desc')->get();

        view()->share('title', $this->title);
        return view('livewire.history', [
            'histories' => $histories,
        ]);
    }
}
