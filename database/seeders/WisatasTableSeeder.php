<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dibawah ini adalah membuat seed pada db yang melalui file factory
        Wisata::factory()
            ->count(10)
            // ->hasLodgers(1)
            ->create();
    }
}
