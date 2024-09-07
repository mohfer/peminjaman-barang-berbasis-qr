<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;

    public $title = 'Profile';

    #[Validate('image|mimes:png,jpg,jpeg|max:2048')]
    public $image;

    #[Validate('required')]
    public $oldPassword, $newPassword, $confirmPassword;

    public $existingImage, $token, $user, $nim, $name, $gender, $fakultas, $prodi, $phone, $email, $role;

    public function mount()
    {
        $this->user = Auth::user();
        $this->token = $this->user->token;
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

    public function save()
    {
        $validatedData = $this->validate([
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
    public function changePassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        if (!$this->user) {
            return false;
        }

        if (!password_verify($this->oldPassword, $this->user->password)) {
            $this->dispatch('showToast', 'Old Password not match!', 'error');
            return;
        }

        if ($this->newPassword !== $this->confirmPassword) {
            $this->dispatch('showToast', 'Confirm password does not match!', 'error');
            return;
        }

        $this->user->password = bcrypt($this->newPassword);
        $this->user->save();
        Auth::logout();

        return redirect()->route('login')->with('success', 'Password changed successfully, please login again!');
    }

    public function logout()
    {
        Auth::logout();

        return $this->redirect(route('login'));
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.profile');
    }
}
