<?php

namespace Database\Factories;

use App\Models\Lodger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LodgerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lodger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nama = $this->faker->name;
        return [
            'nama' => $nama,
            'no_ktp' => Str::random(10),
            'password' => '123123',
            'no_telp' => Str::random(10),
            'no_wa' => Str::random(10),
            'alamat' => Str::random(20),
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')

        ];
    }
}
