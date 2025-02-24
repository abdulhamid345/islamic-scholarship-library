<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{

    protected $guarded = ['id']; 

    protected $casts = [
        'categories' => 'array',
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
}