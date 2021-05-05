<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $dates = ['created_at', 'read_at'];

    protected $fillable = [
        'from_id',
        'to_id',
        'text',
        'read_at',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'from_id');
    }
}
