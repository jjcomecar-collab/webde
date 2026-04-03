<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablesquare extends Model
{
    protected $table = 'tablesquares';

    protected $fillable = [
        'title',
        'icon',
        'color_class',
        'url',
        'aos_delay',
        'estado'
    ];
}
    