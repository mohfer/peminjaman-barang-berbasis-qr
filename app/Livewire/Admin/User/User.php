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
            ->orWhere('nim', 'LIKE', '%' . $this->search . '%')->simplePaginate(5);

        return view('livewire.admin.user.user', [
            'users' => $user,
        ]);
    }
}
