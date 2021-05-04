<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lodger extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'lodgers';

    protected $fillable = [
        'nama', 'no_ktp', 'password', 'no_telp', 'no_wa', 'alamat',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function penginapans()
    {
        return $this->hasMany(Penginapan::class);
    }
}
