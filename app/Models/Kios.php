<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kios extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id', 'lapakumkm_id', 'no_kios', 'nama', 'slug', 'foto', 'agree',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function lapakumkm()
    {
        return $this->belongsTo(Lapakumkm::class, 'lapakumkm_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
