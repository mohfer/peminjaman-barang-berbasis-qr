<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class UpdateUser extends Component
{
    use WithFileUploads;

    public $title = 'Update User';

    #[Validate('image|mimes:png,jpg,jpeg|max:2048')]
    public $image;

    public $existingImage, $user, $nim, $phone, $email, $name, $gender, $fakultas, $prodi, $role;

    public function mount($token)
    {
        $this->user = User::where('token', $token)->first();
        $this->nim = $this->user->nim;
        $this->name = $this->user->name;
        $this->gender = $this->user->gender;
        $this->fakultas = $this->user->fakultas;
        $this->prodi = $this->user->prodi;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
        $this->existingImage = $this->user->image;
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
            'role' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($this->image) {
            $filename = $this->nim . '_' . $this->name . '.' . $this->image->extension();
            $this->image->storeAs('public/images/users', $filename);
            $validatedData['image'] = $filename;
        } else {
            $validatedData['image'] = $this->existingImage;
        }

        $this->user->update($validatedData);

        $this->dispatch('showToast', 'Data updated successfully!', 'success');
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.user.update-user');
    }
}
