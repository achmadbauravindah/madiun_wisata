<?php

namespace Database\Factories;

use App\Models\Lapakumkm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LapakumkmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lapakumkm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        $nama = $this->faker->name;
        return [
            'manager_id' => $number++,
            'nama' => $nama,
            'slug' => Str::slug($nama),
            'kelurahan' => 'Kelurahan Mbuh',
            'lokasi' => 'JL. Ini Lokasi Lapak UMKM',
            'gmap' => 'https://www.google.co.id/maps',
            'foto' => 'storage/images/lapakumkms/inifotolapak.jpg',
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ];
    }
}
