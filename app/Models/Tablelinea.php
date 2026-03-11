<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablelinea extends Model
{
    protected $table = 'tablelineas';

    protected $fillable = [
        'about_titulo',
        'about_subtitulo',
        'about_anio',
        'about_descripcion',
        'about_descripcion_extra',
        'about_imagen',
        'about_video_url',
        'services',
        'estado'
    ];

    protected $casts = [
        'services' => 'array',
    ];
}
