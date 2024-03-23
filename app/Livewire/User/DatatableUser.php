<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Livewire\Forms\User as UserForm;
use Exception;

class DatatableUser extends Component
{
    use WithPagination, WithoutUrlPagination;

    // public UserForm $form;

    public $perPage = 1;

    public $search = '';

    public $sortDirection = 'ASC';

    public $sortColumn = 'firstname';
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

    public function save()
    {
        // $this->validate();

        // $test = UserModel::create($this->all());


        $this->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'username' => 'required|string|unique:users|max:50',
            'email' => 'required|string|email|unique:users|max:50',
            'password' => 'required|string|max:50',
            'repeat_password' => 'required|string|same:password|max:50',
        ]);
        try {
            User::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
            ]);
        } catch (Exception $ex) {

            session()->flash('message', $ex);
        }
        // if (empty($this->user)) {
        // } else {
        //     $this->user->update($this->only('firstname', 'lastname', 'password'));
        // }
    }


    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    // public function save()
    // {
    //     $this->form->store();
    // }
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user.datatable-user', ['users' => User::search($this->search)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage)]);
    }
}