<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\LoginCredential;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CreateUser extends Component
{
    use WithFileUploads;

    public $title = 'Create User';

    #[Validate('nullable|image|mimes:png,jpg,jpeg|max:2048')]
    public $image;

    #[Validate('required|numeric|digits_between:1,12|unique:users')]
    public $nim, $phone;

    #[Validate('required|unique:users')]
    public $email;

    #[Validate('required')]
    public $name, $gender, $fakultas, $prodi, $role;

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

        if ($this->image) {
            $filename = $this->nim . '_' . $this->name . '.' . $this->image->extension();
            $this->image->storeAs('public/images/users', $filename);
            $validatedData['image'] = $filename;
        }

        DB::beginTransaction();

        try {
            User::create($validatedData);
            Mail::to($validatedData['email'])->send(new LoginCredential($sender, $recipient, $nim, $password));
            DB::commit();
            $this->dispatch('showToast', 'Data created successfully and email sent!', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Email sending failed: ' . $e->getMessage());
            $this->dispatch('showToast', 'Data created successfully, but failed to send email. Please try again later.', 'error');
        }

        $this->clear();
    }

    public function clear()
    {
        $this->image = '';
        $this->nim = '';
        $this->name = '';
        $this->gender = '';
        $this->phone = '';
        $this->email = '';
        $this->fakultas = '';
        $this->prodi = '';
        $this->role = '';
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.user.create-user');
    }
}
