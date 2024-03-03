<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'gender',
        'birthday',
        'image'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Booted the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::booted();

        static::created(function ($user) {
            $role = Role::where('name', 'client')->first();
            if ($role) {
                $user->roles()->attach($role);
            }
        });
    }


    public function scopeSearch($query, $value)
    {
        $query->where('firstname', 'like', "%{$value}%")
            ->orWhere('lastname', 'like', "%{$value}%");
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'created_by');
    }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class, 'like_by');
    // }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function replies()
    // {
    //     return $this->hasMany(Reply::class);
    // }
}