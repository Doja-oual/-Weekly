<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'titre',
        'description',
        'prix',
        'status',
        'user_id',
        'categorie_id'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedByUser()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}
