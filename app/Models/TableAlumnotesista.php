<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableAlumnotesista extends Model
{
    protected $table = 'tablealumnotesistas';

    protected $fillable = [
        'modulo',
        'nombre',
        'foto',
        'titulo',
        'fecha',
    ];
}
