<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tableacreditacion extends Model
{
    protected $table = 'tableacreditacions';

    protected $fillable = [
        'about_titulo',
        'about_subtitulo',
        'about_descripcion',
        'about_imagen',
        'video_url',
        'services',
        'service_menu',
        'detail_titulo',
        'detail_descripcion',
        'detail_imagen',
    ];

    protected $casts = [
        'services' => 'array',
        'service_menu' => 'array',
    ];
}
