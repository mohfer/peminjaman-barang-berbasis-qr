<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DashboardAdmin extends Component
{

    public $title = 'Dashboard';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.dashboard-admin');
    }
}
