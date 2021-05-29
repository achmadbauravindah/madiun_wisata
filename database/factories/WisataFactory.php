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
            'nama' => $this->faker->sentence(),
            'slug' => \Str::slug($this->faker->sentence()),
            'deskripsi' => $this->faker->paragraph(10),
            'lokasi' => $this->faker->sentence(),
            'gmap' => 'https://www.google.co.id/maps',
            'gambar' => $this->faker->sentence(),
        ];
    }
}
