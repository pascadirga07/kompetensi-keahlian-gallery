<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gallery as GalleryModel;
use Livewire\WithoutUrlPagination;

class Gallery extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        return view('livewire.home.gallery', ['galleries' => GalleryModel::paginate(9)]);
    }
}