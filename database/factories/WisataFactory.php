<?php

namespace Database\Factories;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator;

class WisataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wisata::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => 'Pecel Land',
            'slug' => \Str::slug($this->faker->sentence()),
            'deskripsi' => $this->faker->paragraph(10),
            'lokasi' => 'Jl. Ini Lokasi Wisata',
            'gmap' => 'https://www.google.co.id/maps',
            'gambar' => $this->faker->image('public/storage', 640, 480, null, false),
        ];
    }
}
