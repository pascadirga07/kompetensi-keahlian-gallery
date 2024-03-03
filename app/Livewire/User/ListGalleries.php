<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ListGalleries extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $id;

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            $this->id = Auth::guard('admin')->id();
        } else if (Auth::guard('client')->check()) {
            $this->id = Auth::guard('client')->id();
        } else {
            $this->id = null;
        }
    }

    public function render()
    {
        return view('livewire.user.list-galleries', ['galleries' => Gallery::where('created_by', $this->id)->with('creator')->paginate(10)]);
    }
}