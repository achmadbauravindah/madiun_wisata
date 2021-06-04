<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapakumkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_id', 'nama', 'kelurahan', 'slug', 'lokasi', 'gmap',  'foto',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function kioses()
    {
        return $this->hasMany(Kios::class);
    }
}
