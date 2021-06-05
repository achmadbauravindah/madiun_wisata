<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

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
            'lapakumkm_id' => $number++,
            'nama' => $nama,
            'nik' => rand(1111111111111111, 9999999999999999),
            'password' => Hash::make('123123'),
            'email' => $this->faker->unique()->email,
            'ktp_img' => $this->faker->image('public/storage/images', 640, 480, null, false),
            'no_wa' => Str::random(10),
            'alamat' => Str::random(20),
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ];
    }
}
