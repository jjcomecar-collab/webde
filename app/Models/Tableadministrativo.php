<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tableadministrativo extends Model
{
    protected $table = 'tableadministrativos';

    protected $fillable = [
        'cargo',
        'nombre',
        'email',
        'imagen',
        'orden'
    ];
}
