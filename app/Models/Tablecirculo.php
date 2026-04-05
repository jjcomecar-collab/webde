<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablecirculo extends Model
{
    protected $table = 'tablecirculos';

    protected $fillable = [
        'circulo',   // 🔥 nombre del grupo
        'nombre',    // integrante
        'cargo',     // presidente, miembro, etc
        'imagen',
        'orden',     // 🔥 orden manual
        'estado'
    ];
}