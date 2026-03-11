<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tableportfolio extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'categoria'
    ];
}
