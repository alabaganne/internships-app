<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company_supervisor_id',
        'field_id',
        'remote',
        'open',
        'student_id',
        'attachments',
        'closing_at'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

    public function supervisor() {
        return $this->belongsTo(CompanySupervisor::class);
    }

    public function skills() {
        return $this->belongsToMany(Skill::class);
    }

    public function student() {
        return $this->belongsToMany(Student::class)
            ->as('application')
            ->withPivot(['content', 'resume', 'cover_letter'])
            ->withTimestamps();
    }
}
