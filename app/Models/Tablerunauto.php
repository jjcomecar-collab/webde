<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablerunauto extends Model
{
    use HasFactory;

    protected $table = 'tablerunautos';

    protected $fillable = [
        'nombre',
        'imagen',
        'orden',
        'estado',
    ];
}
