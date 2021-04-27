<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lodger extends Authenticatable
{
    use Notifiable;

    protected $guard = 'lodgers';

    protected $fillable = [
        'name', 'no_ktp', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
