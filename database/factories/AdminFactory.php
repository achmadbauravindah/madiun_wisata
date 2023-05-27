<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->name;
        return [
            'id' => 0,
            'nama' => 'Achmad Bauravindah',
            'username' => 'achmadbauravindah',
            'is_super' => True,
            'password' => Hash::make('123123'),
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ];
    }
}
