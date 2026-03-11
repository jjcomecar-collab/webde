<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabledecanofun extends Model
{
    use HasFactory;

    protected $table = 'tabledecanofuns';

    protected $fillable = [
        'titulo_pagina',
        'nombre',
        'imagen',
        'funciones'
    ];

    protected $casts = [
        'funciones' => 'array',
    ];
}
