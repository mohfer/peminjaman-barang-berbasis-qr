<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item as ModelsItem;

class Item extends Component
{
    use WithPagination;

    public $title = 'Users';

    public $search = '';

    public function delete($id)
    {
        $user = ModelsItem::findOrFail($id);
        $user->delete();

        notify()->success('User berhasil dihapus');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        view()->share('title', $this->title);

        $user = ModelsItem::where('nama', 'LIKE', '%' . $this->search . '%')
            ->orWhere('nim', 'LIKE', '%' . $this->search . '%')->simplePaginate(5);

        return view('livewire.admin.item.item');
    }
}
