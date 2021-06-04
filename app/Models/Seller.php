<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'sellers';

    protected $fillable = [
        'lapakumkm_id', 'nama', 'nik', 'password', 'email',  'ktp_img',  'no_wa', 'jenis_kelamin', 'alamat',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function lapakumkm()
    {
        return $this->belongsTo(Lapakumkm::class, 'lapakumkm_id');
    }

    public function kioses()
    {
        return $this->hasMany(Kios::class);
    }
}
