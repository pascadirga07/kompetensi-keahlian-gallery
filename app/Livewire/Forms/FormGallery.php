<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

use App\Models\Gallery;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class FormGallery extends Form
{
    //
    use WithFileUploads;

    public Gallery $gallery;

    public $title;

    public $content;

    public function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('galleries')->ignore($this->gallery),
            ],
            'content' => [
                'required|img|max:4024|dimensions:min_width=300,min_height=500',
                Rule::unique('galleries')->ignore($this->gallery),
            ],
        ];
    }

    public function store()
    {
        $this->validate();

        Gallery::create([
            'title' => $this->title,
            'content' => $this->content->store('galleries', 'public'),
        ]);
    }
}