<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function internships() {
        return $this->morphedByMany(Internship::class, 'skillable');
    }

    public function students() {
        return $this->morphedByMany(Student::class, 'skillable');
    }
}
