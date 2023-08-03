<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersList extends Component
{
    public $users;

    protected $listeners = [
        'loadUsers'
    ];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = \App\Models\User::all();
    }

    public function editUser($user_id)
    {
        $this->emitTo('user-form', 'edit', $user_id);
    }

    public function deleteUser(\App\Models\User $user)
    {
        $user->delete();

        $this->loadUsers();
    }

    public function render()
    {
        return view('livewire.users-list');
    }
}
