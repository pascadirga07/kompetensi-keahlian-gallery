<?php

namespace App\Livewire\Home;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $user;

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            $this->user = Auth::guard('admin')->user();
        } elseif (Auth::guard('client')->check()) {
            $this->user = Auth::guard('client')->user();
        }
    }

    public function render()
    {
        return view('livewire.home.navbar');
    }
}