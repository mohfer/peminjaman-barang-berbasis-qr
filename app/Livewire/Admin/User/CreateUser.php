<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\LoginCredential;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CreateUser extends Component
{
    public $title = 'Create User';

    #[Validate('required|numeric|digits_between:1,12|unique:users')]
    public $nim, $phone;

    #[Validate('required|unique:users')]
    public $email;

    #[Validate('required')]
    public $name, $gender, $fakultas, $prodi;

    protected $token;

    public function save()
    {
        $this->name = ucwords($this->name);
        $this->prodi = ucwords($this->prodi);
        $this->token = strtolower(Str::random(10));

        $validatedData = $this->validate();

        $validatedData['token'] = $this->token;

        $password = Str::random(10);
        $sender = Auth::user();
        $recipient = $validatedData['name'];
        $nim = $validatedData['nim'];
        $validatedData['password'] = $password;

        User::create($validatedData);
        // Mail::to($validatedData['email'])->send(new LoginCredential($sender, $recipient, $nim, $password));

        $this->dispatch('showToast', 'Data created successfully!', 'success');

        $this->clear();
    }

    public function clear()
    {
        $this->nim = '';
        $this->name = '';
        $this->gender = '';
        $this->phone = '';
        $this->email = '';
        $this->fakultas = '';
        $this->prodi = '';
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.user.create-user');
    }
}
