<?php
// app/Models/Bachiller.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablebachiller extends Model
{
    use HasFactory;

    protected $table = 'tablebachillers';

    protected $fillable = [
        'titulo',
        'descripcion',
        'icono',
        'color',
        'url',
    ];
}
