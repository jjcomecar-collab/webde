<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAuditorio extends Model
{
    use HasFactory;

    protected $table = 'tableauditorios';

    protected $fillable = [
        'title',
        'image',
    ];
}
