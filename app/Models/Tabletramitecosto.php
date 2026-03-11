<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabletramitecosto extends Model
{
    use HasFactory;

    protected $table = 'tabletramitecostos';

    protected $fillable = [
        'section',
        'title',
        'subtitle',
        'icon',
        'link',
        'description',
        'color',
        'order',
    ];
}
