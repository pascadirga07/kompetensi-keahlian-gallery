<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Gallery;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class StoreGallery extends Component
{

    use WithFileUploads;


    #[Validate('required')]
    public $title;

    #[Validate('mimes:jpg,png,svg|max:1024|dimensions:min_width=300,min_height=500')]
    public $content;

    public function save()
    {

        $this->validate();
        // $gallery = new Gallery();

        // $gallery->title = $this->title;
        // $gallery->content = $this->content->store('profiles', 'public');
        // $gallery->created_by = 2;

        // $gallery->save();
        Gallery::create([
            'title' => $this->title,
            'content' => $this->content->store('profiles', 'public'),
            'created_by' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function render()
    {
        return view('livewire.user.store-gallery');
    }
}