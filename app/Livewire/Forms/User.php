<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

use App\Models\User as UserModel;

class User extends Form
{
    public ?UserModel $user;

    public $firstname;

    public $lastname;

    public $username;

    public $email;

    public $password;

    public $repeat_password;

    public function rules()
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

    public function setUser(UserModel $user)
    {
        $this->user = $user;

        $this->firstname = $user->firstname;

        $this->lastname = $user->lastname;

        $this->username = $user->username;

        $this->email = $user->email;

        $this->password = $user->password;
        $this->repeat_password = $user->repeat_password;
    }

    public function setUserUpdate(UserModel $user)
    {
        $this->user = $user;

        $this->firstname = $user->firstname;

        $this->lastname = $user->lastname;
    }

    public function store()
    {
        $this->validate();

        UserModel::create($this->only('firstname', 'lastname', 'password'));

        session()->flash('message', 'User created successfully.');
    }


    public function update($user_id)
    {
        $this->validate();

        $user = UserModel::find($user_id);

        if ($user) {
            $user->update($this->only('firstname', 'lastname'));
        }
    }
}