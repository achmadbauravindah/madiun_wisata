<?php

namespace Database\Seeders;

use App\Models\Lodger;
use Illuminate\Database\Seeder;

class LodgersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lodger::factory()
            ->count(10)
            // ->hasLodgers(1)
            ->create();
    }
}
