<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'managers';

    protected $fillable = [
        'lapakumkm_id', 'nama', 'nik', 'password', 'email', 'ktp_img', 'no_wa', 'alamat',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lapakumkm()
    {
        return $this->hasOne(Lapakumkm::class);
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }
}
