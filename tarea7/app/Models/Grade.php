<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'grade', 'date'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
