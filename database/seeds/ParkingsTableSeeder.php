<?php

use Illuminate\Database\Seeder;
use App\Models\Parking;

class ParkingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parking::create([
            'name' => 'République',
            'code' => 'RE',
        ]);        
        Parking::create([
            'name' => 'Opéra',
            'code' => 'OP',
        ]);         
        Parking::create([
            'name' => 'Nouveau Siècle',
            'code' => 'NS',
        ]);         
        Parking::create([
            'name' => 'Lille Flandre',
            'code' => 'LF',
        ]);     
    }
}
