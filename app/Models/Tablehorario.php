<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablehorario extends Model
{
    protected $table = 'tablehorarios';

    protected $fillable = [
        'titulo',
        'descripcion',
        'url',
        'color_icono',
    ];
}
