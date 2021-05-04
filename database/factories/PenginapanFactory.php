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
            'lokasi' => Str::random(10),
            'harga' => Str::random(10),
            'spesifikasi' => Str::random(10),
            'gambar' => Str::random(10),
            'agree' => $agree,
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')

        ];
    }
}
