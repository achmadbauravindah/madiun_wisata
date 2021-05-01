<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'slug', 'deskripsi', 'lokasi', 'gambar',
    ];

    public function takeImage()
    {
        // dd($this->gambar);
        return "/storage/" . $this->gambar;
    }
}
