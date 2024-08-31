<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as ModelsUser;

class User extends Component
{
    use WithPagination;

    public $title = 'Users';

    public $search = '';

    public function delete($id)
    {
        $user = ModelsUser::findOrFail($id);
        $user->delete();

        notify()->success('User berhasil dihapus');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        view()->share('title', $this->title);

        $user = ModelsUser::where('nama', 'LIKE', '%' . $this->search . '%')
            ->orWhere('nim', 'LIKE', '%' . $this->search . '%')->simplePaginate(5);

        return view('livewire.admin.user.user', [
            'users' => $user,
        ]);
    }
}
