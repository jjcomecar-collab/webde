<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tableestandare extends Model
{
    use HasFactory;

    protected $table = 'tableestandares';

    protected $fillable = [

        // ABOUT
        'about_titulo',
        'about_subtitulo',
        'about_anio',
        'about_descripcion',
        'about_lista',
        'about_video_url',
        'about_imagen',

        // SERVICES
        'services',

        // SERVICE DETAILS
        'service_menu',
        'service_detalle_titulo',
        'service_detalle_descripcion',
        'service_detalle_imagen',
        'service_detalle_lista',

        // FEATURES
        'features_titulo',
        'features_subtitulo',
        'features_items',
    ];

    protected $casts = [
        'about_lista' => 'array',
        'services' => 'array',
        'service_menu' => 'array',
        'service_detalle_lista' => 'array',
        'features_items' => 'array',
    ];
}
