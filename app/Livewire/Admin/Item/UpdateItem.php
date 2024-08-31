<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class UpdateItem extends Component
{
    public $title = 'Update Item';

    public $item;

    #[Validate('required|unique:items')]
    public $code, $name;

    #[Validate('required')]
    public $type, $qty;

    public function mount($id)
    {
        $this->item = Item::findOrFail($id);
        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->type = $this->item->type;
        $this->qty = $this->item->qty;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'code' => ['required', Rule::unique('items')->ignore($this->item->id)],
            'name' => ['required', Rule::unique('items')->ignore($this->item->id)],
            'type' => 'required',
            'qty' => 'required',
        ]);

        $this->item->update($validatedData);

        notify()->success('Item berhasil diupdate!');
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.item.update-item');
    }
}
