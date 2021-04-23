<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'image',
        'linkedin_profile_url',
        'userable_id',
        'userable_type'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userable() {
        return $this->morphTo();
    }

    public function isCompany() {
        return Str::contains($this->userable_type, 'Company');
    }

    public function isStudent() {
        return Str::contains($this->userable_type, 'Student');
    }

    public function isUniversitySupervisor() {
        return Str::contains($this->userable_type, 'UniversitySupervisor');
    }

    public function isAdmin() {
        return $this->is_admin; // TODO: add is admin column to the users table to check whether a user is admin or not
    }
}
