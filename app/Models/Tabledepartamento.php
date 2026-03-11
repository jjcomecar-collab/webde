<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabledepartamento extends Model
{
    use HasFactory;

    protected $table = 'tabledepartamentos';

    protected $fillable = [
        'titulo_pagina',
        'nombre',
        'imagen',
        'funciones',
        'plan_titulo',
        'planes',
    ];

    protected $casts = [
        'funciones' => 'array',
        'planes' => 'array',
    ];
}
