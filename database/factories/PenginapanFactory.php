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
        return [
            'lodger_id' => rand(1, 3),
            'nama' => 'Penginapan Telang',
            'slug' => Str::slug($nama),
            'lokasi' => 'JL. Ini Lokasi Penginapan',
            'gmap' => 'https://www.google.co.id/maps',
            'harga' => '100.000',
            'spesifikasi' => 'Lengkap No Minus No Cacat',
            'imgdepan' => $this->faker->image('public/storage', 640, 480, null, false),
            'imgkamar' => $this->faker->image('public/storage', 640, 480, null, false),
            'imgwc' => $this->faker->image('public/storage', 640, 480, null, false),
            'agree' => 1,
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')

        ];
    }
}
