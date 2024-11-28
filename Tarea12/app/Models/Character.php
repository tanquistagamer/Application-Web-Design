<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'movie_id',
        'picture',
        'description',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
