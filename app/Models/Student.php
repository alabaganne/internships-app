<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['about'];

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

    public function internships() {
        return $this->belongsToMany(Internship::class, 'applications')
            ->as('application')
            ->withPivot(['content', 'resume', 'cover_letter'])
            ->withTimestamps();
    }
}
