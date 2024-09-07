<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $user, $image;

    public function mount()
    {
        $this->user = Auth::user();
        $this->image = $this->user->image;
    }
    public function logout()
    {
        Auth::logout();

        return $this->redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
