<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $title = 'Login';

    #[Validate('required')]
    public $nim, $password;

    protected $redirectTo = '/dashboard';

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['nim' => $this->nim, 'password' => $this->password])) {
            return redirect()->intended();
        } else {
            $this->dispatch('showToast', 'Login failed!', 'error');
            $this->password = '';
        }
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.login');
    }
}
