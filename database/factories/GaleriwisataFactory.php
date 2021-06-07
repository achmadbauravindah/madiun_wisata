<?php

namespace Database\Factories;

use App\Models\Galeriwisata;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriwisataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Galeriwisata::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        return [
            'wisata_id' => $number++,
            'galeri' => $this->faker->image('public/storage', 640, 480, null, false),
        ];
    }
}
