<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'reset_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'reset_token',
    ];

    public function setPasswordAttribute($value)
    {
        // auto hash password
        $this->attributes['password'] = bcrypt($value);
    }
}
