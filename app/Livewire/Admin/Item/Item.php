<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item as ModelsItem;
use Illuminate\Support\Facades\Storage;

class Item extends Component
{
    use WithPagination;

    public $title = 'Items';

    public $search = '';

    public function delete($token)
    {
        $item = ModelsItem::where('token', $token)->first();

        $filename = $item->image;

        if ($filename && Storage::exists('public/images/items/' . $filename)) {
            Storage::delete('public/images/items/' . $filename);
        }

        $item->delete();

        $this->dispatch('showToast', 'Data deleted successfully!', 'success');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        view()->share('title', $this->title);

        $item = ModelsItem::where('name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('code', 'LIKE', '%' . $this->search . '%')
        ->orWhere('type', 'LIKE', '%' . $this->search . '%')
        ->orderBy('name', 'asc')
        ->paginate(5);

        return view('livewire.admin.item.item', [
            'items' => $item,
        ]);
    }
}
