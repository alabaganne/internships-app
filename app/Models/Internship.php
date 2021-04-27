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
        'company_id',
        'company_supervisor_id',
        'field_id',
        'remote',
        'open',
        'student_id',
        'attachments',
        'closing_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'closing_at'];

    protected $casts = [
        'remote' => 'boolean',
        'closing_at' => 'datetime:Y-m-d'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

    public function companySupervisor() {
        return $this->belongsTo(CompanySupervisor::class);
    }

    public function skills() {
        return $this->morphToMany(Skill::class, 'skillable');
    }

    public function city() {
        return $this->company()->city();
    }

    public function applications() { // students who applied for this internship
        return $this->belongsToMany(Student::class, 'applications')
            ->withPivot(['cover_letter', 'message', 'attachments'])
            ->withTimestamps();
    }
}
