<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'cover_letter',
        'message',
        'attachments',
        'status'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function internship() {
        return $this->belongsTo(Internship::class);
    }
}
