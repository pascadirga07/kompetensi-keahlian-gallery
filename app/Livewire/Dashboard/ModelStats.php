<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ModelStats extends Component
{

    public $stats;

    public function mount()
    {
        $request = Request::create('/stats/api/dashboards', 'GET');
        $response = json_decode(Route::dispatch($request)->getContent());

        $this->stats = $response;
    }

    public function render()
    {
        return view('livewire.dashboard.model-stats');
    }
}