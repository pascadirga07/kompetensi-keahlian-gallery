<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

use App\Models\User as UserModel;

class User extends Form
{
    public ?UserModel $user = null;

    public $firstname;

    public $lastname;

    public $username;

    public $email;

    public $password;

    public $repeat_password;

    public function rules(): array
    {
        return [
            'firstname' => 'required|min:5',
            'lastname' => 'required|min:5',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
            'password' => 'required|min:5',
            'repeat_password' => 'required|min:5|same:password',
        ];
    }

    public function setUser(?UserModel $user = null): void
    {
        $this->user = $user;

        $this->firstname = $user->firstname;

        $this->lastname = $user->lastname;

        $this->username = $user->username;

        $this->email = $user->email;

        $this->password = $user->password;
        $this->repeat_password = $user->repeat_password;
    }

    public function store()
    {
        $this->validate();

        if (empty($this->user)) {
            UserModel::create($this->only('firstname', 'lastname', 'password', 'username', 'email'));
        } else {
            $this->user->update($this->only('firstname', 'lastname', 'password'));
        }
        session()->flash('status', 'User created successfully.');
    }
}