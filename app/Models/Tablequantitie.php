<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablequantitie extends Model
{
    use HasFactory;

    protected $table = 'tablequantities';

    protected $fillable = [
        'titulo',
        'cantidad',
        'icono',
        'duracion',
        'estado',
    ];
}
