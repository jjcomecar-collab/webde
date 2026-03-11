<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablereprepolitica extends Model
{
    use HasFactory;

    protected $table = 'tablereprepoliticas';

    protected $fillable = [
        'page_title',
        'image',
        'inner_title',
        'year',
        'story_title',
        'description',
        'list_items',
        'final_text',
        'video_url',
    ];

    protected $casts = [
        'list_items' => 'array',
    ];
}
