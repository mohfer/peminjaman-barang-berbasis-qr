<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public $title = 'Dashboard';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.dashboard');
    }
}
