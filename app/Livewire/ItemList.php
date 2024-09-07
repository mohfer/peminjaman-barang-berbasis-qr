<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
{
    use WithPagination;

    public $title = 'Item Lists';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $lists = Item::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('code', 'LIKE', '%' . $this->search . '%')
            ->orderBy('name', 'asc')
            ->paginate(5);

        view()->share('title', $this->title);
        return view('livewire.item-list', [
            'lists' => $lists,
        ]);
    }
}
