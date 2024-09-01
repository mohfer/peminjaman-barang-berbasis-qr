<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ToastNotification extends Component
{
    public $message;
    public $type;

    protected $listeners = ['showToast'];

    public function showToast($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->dispatch('trigger-toast'); // Menggunakan dispatchBrowserEvent untuk event browser
    }

    public function render()
    {
        return view('livewire.components.toast-notification');
    }
}
