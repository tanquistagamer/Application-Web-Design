<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'classification',
        'release_date',
        'review',
        'season',
    ];

    // App\Models\Movie.php
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
