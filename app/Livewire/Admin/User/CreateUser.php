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

    #[Validate('required|unique:users')]
    public $nim, $telp, $email;

    #[Validate('required')]
    public $nama, $jk, $fakultas, $prodi;

    public function save()
    {
        $validatedData = $this->validate();

        $password = Str::random(10);
        $sender = Auth::user();
        $recipient = $validatedData['nama'];
        $nim = $validatedData['nim'];
        $validatedData['password'] = $password;

        User::create($validatedData);
        // Mail::to($validatedData['email'])->send(new LoginCredential($sender, $recipient, $nim, $password));

        notify()->success('User Berhasil Ditambah');
        return $this->redirect(route('users'), navigate: true);

        $this->clear();
    }

    public function clear()
    {
        $this->nim = '';
        $this->nama = '';
        $this->jk = '';
        $this->telp = '';
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
