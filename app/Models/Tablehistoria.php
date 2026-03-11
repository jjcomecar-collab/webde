<?php

// app/Models/Tablehistoria.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablehistoria extends Model
{
    use HasFactory;

    protected $table = 'tablehistorias';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'paragraph_1',
        'paragraph_2',
        'paragraph_3',
    ];
}
