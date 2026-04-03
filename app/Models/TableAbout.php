<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableAbout extends Model
{
    protected $table = 'tableabouts';

    protected $fillable = [
        'modulo',
        'imagen',
        'titulo',
        'year',
        'subtitulo',
        'descripcion',
        'items',
        'descripcion_final',
        'video_url',

        'estado', // <-- AGREGAR
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
