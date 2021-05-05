<?php

namespace Database\Factories;

use App\Models\Lodger;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'email' => $this->faker->unique()->email,
            'no_ktp' => rand(1111111111111111, 9999999999999999),
            'ktp_img' => $this->faker->image('public/storage/images', 640, 480, null, false),
            'password' => Hash::make('123123'),
            'no_telp' => Str::random(10),
            'no_wa' => Str::random(10),
            'alamat' => Str::random(20),
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')

        ];
    }
}
