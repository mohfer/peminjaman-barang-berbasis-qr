<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class UpdateUser extends Component
{
    public $title = 'Update User';

    public $user, $nim, $phone, $email, $name, $gender, $fakultas, $prodi;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->nim = $this->user->nim;
        $this->name = $this->user->name;
        $this->gender = $this->user->gender;
        $this->fakultas = $this->user->fakultas;
        $this->prodi = $this->user->prodi;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
    }

    public function update()
    {
        $this->name = ucwords($this->name);
        $this->prodi = ucwords($this->prodi);

        $validatedData = $this->validate([
            'nim' => ['required', 'numeric', 'digits_between:1,12', Rule::unique('users')->ignore($this->user->id)],
            'phone' => ['required', 'numeric', 'digits_between:1,12', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'name' => 'required',
            'gender' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
        ]);

        $this->user->update($validatedData);

        $this->dispatch('showToast', 'Data updated successfully!', 'success');
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.user.update-user');
    }
}
