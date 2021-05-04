<?php

namespace Database\Seeders;

use App\Models\Penginapan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PenginapansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dibawah ini adalah membuat seed pada db yang melalui file factory
        Penginapan::factory()
            ->count(10)
            // ->hasLodgers(1)
            ->create();
    }
}
