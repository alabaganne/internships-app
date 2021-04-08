<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySupervisor extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }
}
