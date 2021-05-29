<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Penginapan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenginapanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penginapan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->name;
        // Ini akan mendapatkan nilai true atau false, karena '=='
        $agree = rand(0, 1) == 1;
        return [
            'lodger_id' => rand(1, 3),
            'nama' => $nama,
            'slug' => Str::slug($nama),
            'lokasi' => 'JL. Ini Lokasi Penginapan',
            'gmap' => 'https://www.google.co.id/maps',
            'harga' => '50.0000',
            'spesifikasi' => 'Spesifikasinya Gatau',
            'imgdepan' => 'storage/images/penginapans/loginhsdepan.jpg',
            'imgkamar' => 'storage/images/penginapans/loginhskamarmandi.jpg',
            'imgwc' => 'storage/images/penginapans/logihhskamarmandi.jpg',
            'agree' => $agree,
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')

        ];
    }
}
