<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;

class UpdateProfile extends Form
{


    public ?User $user;
    #[Validate('required')]
    public $firstname;

    #[Validate('required')]
    public $lastname;

    // #[Validate('required')]
    public $birthday;

    // #[Validate('required')]
    public $gender;



    public $username;
    public $email;

    public function setUser($user)
    {
        $this->user = $user;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->birthday = $user->birthday;
        $this->gender = $user->gender;
    }


    public function update()
    {
        $this->validate();

        $this->user->update(
            $this->all()
        );
    }
}