<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavbarAdmin extends Component
{

    public function logout()
    {
        Auth::logout();

        return $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.components.navbar-admin');
    }
}
