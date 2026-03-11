<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tableservice extends Model
{
    protected $table = 'tableservices';

    protected $fillable = [
        'modulo',
        'titulo',
        'descripcion',
        'icono',
        'color',
    ];
}
