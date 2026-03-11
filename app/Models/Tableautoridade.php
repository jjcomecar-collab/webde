<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tableautoridade extends Model
{
    protected $table = 'tableautoridades';

    protected $fillable = [
        'cargo',
        'nombre',
        'email',
        'imagen',
        'orden'
    ];
}
