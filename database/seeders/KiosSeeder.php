<?php

namespace Database\Seeders;

use App\Models\Kios;
use Illuminate\Database\Seeder;

class KiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kios::factory()
            ->count(10)
            // ->hasLodgers(1)
            ->create();
    }
}
