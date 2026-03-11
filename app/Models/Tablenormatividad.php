<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablenormatividad extends Model
{
    use HasFactory;

    protected $table = 'tablenormatividads';

    protected $fillable = [
        'section',
        'tipo',
        'titulo',
        'subtitulo',
        'descripcion',
        'items',
        'url',
        'icono',
        'color',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
