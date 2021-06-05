<?php

namespace Database\Factories;

use App\Models\Kios;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KiosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kios::class;

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
            'seller_id' => $number++,
            'lapakumkm_id' => rand(1, 9),
            'no_kios' => null,
            'nama' => $nama,
            'slug' => Str::slug($nama),
            'foto' => 'storage/images/kioses/inifotokios.jpg',
            'agree' => 1,
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ];
    }
}
