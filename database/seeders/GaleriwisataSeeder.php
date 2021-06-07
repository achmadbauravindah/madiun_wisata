<?php

namespace Database\Seeders;

use App\Models\Galeriwisata;
use Illuminate\Database\Seeder;

class GaleriwisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Galeriwisata::factory()
            ->count(10)
            // ->hasLodgers(1)
            ->create();
    }
}
