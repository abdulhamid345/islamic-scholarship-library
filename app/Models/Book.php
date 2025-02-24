<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guarded = 'id'; 

    public function scholar() {
        return $this->belongsTo(Scholar::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}