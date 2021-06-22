<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'kios_id', 'jenis_menu', 'nama', 'harga',
    ];

    public function kios()
    {
        return $this->belongsTo(Kios::class, 'kios_id');
    }
}
