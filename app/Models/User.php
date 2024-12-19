<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;  // Hanya gunakan trait yang diperlukan

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_picture',
        'gas_limit',
        'gas_used'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}