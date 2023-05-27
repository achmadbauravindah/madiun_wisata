<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            WisatasTableSeeder::class,
            GaleriwisataSeeder::class,
            BusSeeder::class,
            TourSeeder::class,
            LodgersTableSeeder::class,
            PenginapansTableSeeder::class,
            ManagerSeeder::class,
            LapakumkmSeeder::class,
            SellerSeeder::class,
            KiosSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
