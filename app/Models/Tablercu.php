<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRcu extends Model
{
    use HasFactory;

    protected $table = 'tablercus';

    protected $fillable = [
        'title',
        'description',
        'download_link',
        'icon',
    ];
}
