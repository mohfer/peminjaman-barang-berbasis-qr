<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $title = 'Login';

    #[Validate('required')]
    public $username, $password;

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['nim' => $this->username, 'password' => $this->password])) {
            notify()->success('Login Berhasil');
            return $this->redirect(route('dashboard-admin'), navigate: true);
        } else {
            notify()->error('Login Gagal');
            $this->password = '';
        }
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.login');
    }
}
