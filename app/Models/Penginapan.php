<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lodger_id', 'nama', 'slug', 'lokasi', 'gmap',  'harga', 'spesifikasi', 'gambar', 'agree',
    ];

    public function lodger()
    {
        return $this->belongsTo(Lodger::class, 'lodger_id');
    }

    public function takeImage()
    {
        // dd($this->gambar);
        return "/storage/" . $this->gambar;
    }
}
