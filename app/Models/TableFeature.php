<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablefeature extends Model
{
    protected $table = 'tablefeatures';

    protected $fillable = [
        'modulo',
        'titulo',
        'url',
        'icono',
        'color',
    ];
}
