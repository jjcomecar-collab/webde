<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablereprederecho extends Model
{
    use HasFactory;

    protected $table = 'tablereprederechos';

    protected $fillable = [
        'titulo_pagina',
        'imagen',
        'inner_title',
        'anio',
        'subtitulo',
        'descripcion',
        'lista',
        'descripcion_final',
        'video_url',
    ];

    protected $casts = [
        'lista' => 'array',
    ];
}
