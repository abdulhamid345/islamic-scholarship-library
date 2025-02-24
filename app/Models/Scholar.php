<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    protected $fillable = [
        'name',
        'about',
        'biography',
        'published_works',
        'students',
        'categories',
        'years_active'
    ];

    protected $casts = [
        'categories' => 'array',
    ];
}
