<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserForm extends Component
{
    public $user;
    public $password;
    protected $listeners = [
        'edit'
    ];
    /*
    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'password' => 'required',
    ];
    */

    protected function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required',
        ];
    }

    protected $messages = [
        'user.name.required' => 'Il campo nome non può essere vuoto.',
    ];

    public function mount()
    {
        $this->newUser();
    }

    public function store()
    {

        $this->validate();

        $this->user->password = \Illuminate\Support\Facades\Hash::make($this->password);

        $this->user->save();

        /*
        \App\Models\User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> \Illuminate\Support\Facades\Hash::make($this->password),
        ]);
        */
        session()->flash('success', 'Utente salvato correttamente.');

        $this->newUser();

        $this->emitTo('users-list', 'loadUsers');
    }

    public function newUser()
    {
        $this->user = new \App\Models\User;
        $this->password = '';
    }

    public function edit($user_id)
    {
        $this->user = \App\Models\User::find($user_id);

        $this->password = '';
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
