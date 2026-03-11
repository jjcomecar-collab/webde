<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablepoi extends Model
{
    use HasFactory;

    protected $table = 'tablepois';

    protected $fillable = [
        'menu',
        'subtitulo',
        'descripcion_corta',
        'imagen',
        'titulo_principal',
        'parrafo_1',
        'lista',
        'parrafo_2',
        'parrafo_3',
    ];

    protected $casts = [
        'menu'  => 'array',
        'lista' => 'array',
    ];
}
