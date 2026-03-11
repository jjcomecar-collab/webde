<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tableconsejofacultad extends Model
{
    use HasFactory;

    protected $table = 'tableconsejofacultads';

    protected $fillable = [
        'about_titulo',
        'about_subtitulo',
        'about_anio',
        'about_descripcion',
        'about_lista',
        'about_video',
        'about_imagen',
        'servicios',
        'detalle_menu',
        'detalle_titulo',
        'detalle_descripcion',
        'detalle_lista',
        'detalle_imagen',
    ];

    protected $casts = [
        'about_lista'   => 'array',
        'servicios'     => 'array',
        'detalle_menu'  => 'array',
        'detalle_lista' => 'array',
    ];
}
