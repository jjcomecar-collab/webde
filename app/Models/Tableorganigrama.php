<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tableorganigrama extends Model
{
    protected $table = 'tableorganigramas';

    protected $fillable = [
        'title',
        'image',
    ];
}
