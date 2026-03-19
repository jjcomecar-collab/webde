<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableDocenteDerecho extends Model
{
    use HasFactory;

    protected $table = 'tabledocentederechos';

    protected $fillable = [
        'nombre',
        'tipo',
        'escuela',
        'imagen',
        'orden'
    ];
}
