<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'website',
        'about',
        'city_id'
    ];

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }
}
