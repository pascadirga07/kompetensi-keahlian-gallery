<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Aside extends Component
{

    public $roles;

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            $this->roles = Auth::guard('admin')->user()->roles->all();
        } else if (Auth::guard('client')->check()) {
            $this->roles = Auth::guard('client')->user()->roles->all();
        } else {
            $this->roles = null;
        }
    }
    public function render()
    {
        return view('livewire.dashboard.aside');
    }
}