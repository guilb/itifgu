<?php

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

        $this->call(PlacesTableSeeder::class);


        $this->call(ItinerariesTableSeeder::class);
        $this->call(DistancesTableSeeder::class);
    }
}
