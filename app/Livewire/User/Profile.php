<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\UpdateProfile;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class Profile extends Component
{
    use WithFileUploads;

    public UpdateProfile $form;

    public $user;

    public $user_id;

    #[Validate('mimes:jpg,png,svg|max:1024|dimensions:min_width=300,min_height=500')]
    public $image;

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
        } else if (Auth::guard('client')->check()) {
            $user = Auth::guard('client')->user();
        }
        $this->image = $user->image;
        $this->user_id = $user->id;
        $this->form->setUser($user);
    }

    public function updated($name, $value)
    {
        $this->form->update([
            $name => $value,
        ]);

        session()->flash('status', 'Success: Profile updated successfully!');
    }

    public function updateImage()
    {
        $this->validate();

        $user = User::find($this->user_id);

        if ($user) {
            $user->update([
                'image' => $this->image->store('profiles', 'public'),
            ]);
        }

        session()->flash('status', 'Success: Profile picture updated successfully!');
    }
    public function render()
    {
        return view('livewire.user.profile');
    }
}