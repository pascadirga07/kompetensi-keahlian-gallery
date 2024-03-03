<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'created_by'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    // public function comments()
    // {
    //     return $this->belongsToMany(Comment::class, 'galleries_comments')->withTimestamps();
    // }
}