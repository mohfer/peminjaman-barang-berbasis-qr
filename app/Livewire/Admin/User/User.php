<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Storage;

class User extends Component
{
    use WithPagination;

    public $title = 'Users';

    public $search = '';

    public function delete($token)
    {
        $user = ModelsUser::where('token', $token)->first();

        $filename = $user->image;

        if ($filename && Storage::exists('public/images/users/' . $filename)) {
            Storage::delete('public/images/users/' . $filename);
        }

        $user->delete();

        $this->dispatch('showToast', 'Data deleted successfully!', 'success');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        view()->share('title', $this->title);

        $user = ModelsUser::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('nim', 'LIKE', '%' . $this->search . '%')
            ->orWhere('gender', 'LIKE', '%' . $this->search . '%')
            ->orWhere('fakultas', 'LIKE', '%' . $this->search . '%')
            ->orWhere('prodi', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderBy('name', 'asc')
            ->paginate(5);

        return view('livewire.admin.user.user', [
            'users' => $user,
        ]);
    }
}
