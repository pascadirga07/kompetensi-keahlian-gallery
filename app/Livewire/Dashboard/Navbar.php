<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Navbar extends Component
{
    public $user;

    public function mount()
    {
        $guards = [
            'admin', 'client'
        ];
        foreach ($guards as $guard) {
            if (auth($guard)->user()) {
                $this->user = auth($guard)->user();
            }
        }
    }

    public function render()
    {
        return view('livewire.dashboard.navbar');
    }
}