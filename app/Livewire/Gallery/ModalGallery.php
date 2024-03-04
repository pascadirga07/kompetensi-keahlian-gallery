<?php

namespace App\Livewire\Gallery;

use Livewire\Component;

use App\Models\Gallery;

class ModalGallery extends Component
{
    public $gallery;

    public function mount($id)
    {
        $gallery = Gallery::with('creator')->findOrFail($id);

        $this->gallery = $gallery;
    }

    public function render()
    {
        return view('livewire.gallery.modal-gallery');
    }
}