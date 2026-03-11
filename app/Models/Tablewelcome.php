<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablewelcome extends Model
{
    protected $table = 'tablewelcomes';

    protected $fillable = [
        'title',
        'description',
        'estado',
    ];
}
    