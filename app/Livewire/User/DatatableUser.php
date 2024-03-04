<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User as UserModel;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Livewire\Forms\User as UserForm;

class DatatableUser extends Component
{
    use WithPagination, WithoutUrlPagination;

    public UserForm $form;
    public ?UserModel $user = null;

    public $perPage = 1;

    public $search = '';

    public $sortDirection = 'ASC';

    public $sortColumn = 'firstname';

    public $update_id = [];

    public function mount(UserModel $user = null)
    {
        if ($user->exist) {

            $this->form->setUser($user);
        }
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

    public function save()
    {
        $this->form->store();
    }
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
        return view('livewire.user.datatable-user', ['users' => UserModel::search($this->search)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage)]);
    }
}