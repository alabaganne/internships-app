<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'about',
        'field_id',
        'city_id'
    ];

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function internshipApplications() { // internships that the user has applied to
        return $this->belongsToMany(Internship::class, 'applications')
            ->withPivot(['cover_letter', 'message', 'attachments', 'status'])
            ->withTimestamps();
    }

    public function likesInternships() {
        return $this->belongsToMany(Internship::class, 'likes');
    }
}
