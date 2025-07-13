<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Field yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'title', 
        'content',
    ];
}
