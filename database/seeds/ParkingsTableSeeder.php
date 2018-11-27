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
            'name' => 'Effia République',
            'code' => '13',
        ]);        
        Parking::create([
            'name' => 'Effia Opéra',
            'code' => '12',
        ]);         
        Parking::create([
            'name' => 'Effia Nouveau Siècle',
            'code' => '11',
        ]);         
        Parking::create([
            'name' => 'Effia Champ de Mars',
            'code' => '15',
        ]);          
        Parking::create([
            'name' => 'Euratechnologies',
            'code' => '16',
        ]);     
        Parking::create([
            'id' => 99,
            'name' => 'Administrateurs',
            'code' => 'ALL',
        ]);     
    }
}
