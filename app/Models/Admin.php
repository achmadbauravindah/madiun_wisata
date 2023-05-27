<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $guard = 'admins';

    protected $fillable = [
        'nama', 'username', 'password', 'is_super'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
