<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User as UserModel;
use Livewire\Attributes\Validate;
use Stringable;

class User extends Form
{
    public $firstname = '';

    public $lastname = '';

    public $username = '';

    public $email = '';

    public $password = '';

    public $repeat_password = '';

    // public function setUser($user): void
    // {
    //     $this->user = $user;

    //     $this->firstname = $user->firstname;

    //     $this->lastname = $user->lastname;

    //     $this->username = $user->username;

    //     $this->email = $user->email;

    //     $this->password = $user->password;
    //     $this->repeat_password = $user->repeat_password;
    // }

    public function store()
    {
        // $this->validate();

        // $test = UserModel::create($this->all());
        $data = $this->validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'username' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|max:50',
            'repeat_password' => 'required|same:password|max:50',
        ]);


        UserModel::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        // if (empty($this->user)) {
        // } else {
        //     $this->user->update($this->only('firstname', 'lastname', 'password'));
        // }
        session()->flash('message', 'tst');
    }
}