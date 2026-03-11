<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableServiceDetail extends Model
{
    use HasFactory;

    protected $table = 'tableservice_details';

    protected $fillable = [
        'modulo',
        'titulo',
        'imagen',
        'menu',
        'descripcion',
        'lista',
        'contenido_1',
        'contenido_2',
    ];

    protected $casts = [
        'menu'  => 'array',
        'lista' => 'array',
    ];
}
