<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabledocentepolitica extends Model
{
    protected $table = 'tabledocentepoliticas';

    protected $fillable = [
        'nombre',
        'tipo',
        'imagen',
        'descripcion',
    ];
}
