<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class UpdateUser extends Component
{
    public $title = 'Update User';

    public $user;

    #[Validate('required|unique:users')]
    public $nim, $telp, $email;

    #[Validate('required')]
    public $nama, $jk, $fakultas, $prodi;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->nim = $this->user->nim;
        $this->nama = $this->user->nama;
        $this->jk = $this->user->jk;
        $this->fakultas = $this->user->fakultas;
        $this->prodi = $this->user->prodi;
        $this->telp = $this->user->telp;
        $this->email = $this->user->email;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nim' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'telp' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'nama' => 'required',
            'jk' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
        ]);

        $this->user->update($validatedData);

        notify()->success('User berhasil diupdate!');
        return $this->redirect(route('users'), navigate: true);
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.user.update-user');
    }
}
