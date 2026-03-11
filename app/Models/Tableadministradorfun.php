<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tableadministradorfun extends Model
{
    use HasFactory;

    protected $table = 'tableadministradorfuns';

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
