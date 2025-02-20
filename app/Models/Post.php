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
}
