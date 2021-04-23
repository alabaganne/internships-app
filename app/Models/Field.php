<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function internships() {
        return $this->hasMany(Internship::class);
    }
}
