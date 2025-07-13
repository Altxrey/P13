<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Field yang dapat diisi secara mass assignment
    protected $fillable = [
        'nama',
        'nim',
    ];
}
