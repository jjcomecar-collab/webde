<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableDecano extends Model
{
    use HasFactory;

    protected $table = 'tabledecanos';

    protected $fillable = [
        'cargo',
        'nombre',
        'imagen',
        'orden',
        'estado',
    ];
}
