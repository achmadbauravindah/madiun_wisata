<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Lodger extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'lodgers';

    protected $fillable = [
        'nama', 'email', 'no_ktp', 'ktp_img', 'password', 'no_telp', 'no_wa', 'alamat',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function penginapans()
    {
        return $this->hasMany(Penginapan::class);
    }

    public function takeImage()
    {
        // dd($this->gambar);
        return "/storage/" . $this->ktp_img;
    }
}
