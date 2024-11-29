<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Campos rellenables
    protected $fillable = ['name'];

    // Relación uno a muchos: un Subject tiene muchas Grades
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
