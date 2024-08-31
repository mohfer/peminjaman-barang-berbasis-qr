<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item as ModelsItem;

class Item extends Component
{
    use WithPagination;

    public $title = 'Items';

    public $search = '';

    public function delete($id)
    {
        $item = ModelsItem::findOrFail($id);
        $item->delete();

        notify()->success('Item berhasil dihapus');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        view()->share('title', $this->title);

        $item = ModelsItem::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('code', 'LIKE', '%' . $this->search . '%')->simplePaginate(5);

        return view('livewire.admin.item.item', [
            'items' => $item,
        ]);
    }
}
