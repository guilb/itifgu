<?php

use Illuminate\Database\Seeder;

class ItinerariesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('itineraries')->delete();
        
        \DB::table('itineraries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'divers',
                'places' => '[{lat: -20.9202586, lng: 55.5136433},{lat: -21.045139, lng: 55.247083},{lat: -21.1904127, lng: 55.5368704},{lat: -20.9930591, lng: 55.3897488},{lat: -21.1853877, lng: 55.4330234},]',
                'start_id' => 1,
                'end_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-11-04 03:14:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'sud ouest',
                'places' => '[]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-11-04 03:14:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'est',
                'places' => '[{lat: -20.9487452, lng: 55.6484717},{lat: -20.9366692, lng: 55.6717179},{lat: -20.9170397, lng: 55.630635},{lat: -21.1605808, lng: 55.8241028},{lat: -21.2457707, lng: 55.7983567},]',
                'start_id' => 1,
                'end_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-10-15 21:45:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'vendredi 1',
                'places' => '[{lat: -21.2222188, lng: 55.6894317},{lat: -21.2297636, lng: 55.6634118},]',
                'start_id' => 3,
                'end_id' => 3,
                'created_at' => NULL,
                'updated_at' => '2019-10-15 21:32:33',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'rando piton des neiges',
                'places' => '[{lat: -21.0992849, lng: 55.4802704},]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-10-15 21:32:33',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'sud',
                'places' => '[{lat: -21.368237, lng: 55.5465209},]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-11-02 14:38:24',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'salazie',
                'places' => '[{lat: -21.0447249, lng: 55.5136433},{lat: -21.0395544, lng: 55.5377036},{lat: -21.05833, lng: 55.5164145},]',
                'start_id' => 1,
                'end_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-10-15 21:38:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'cilaos',
                'places' => '[]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-11-04 03:14:28',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'maido saint paul',
                'places' => '[{lat: -21.068889, lng: 55.387778},]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-11-04 03:14:28',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'trou de fer',
                'places' => '[{lat: -21.0438651, lng: 55.5585675},{lat: -21.0610271, lng: 55.5363133},]',
                'start_id' => 1,
                'end_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-10-15 21:45:29',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Mafate',
                'places' => '[{lat: -21.0499146, lng: 55.4272377},]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-10-15 21:45:29',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'samedi 1',
                'places' => '[{lat: -21.006274, lng: 55.271937},{lat: -21.3756533, lng: 55.7107871},{lat: -21.3222914, lng: 55.5025595},{lat: -21.2246156, lng: 55.2926385},]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-11-02 14:38:24',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'dimanche 2',
                'places' => '[{lat: -21.0315639, lng: 55.2273017},{lat: -21.0794928, lng: 55.222319},{lat: -21.136617, lng: 55.463134},{lat: -21.2801323, lng: 55.3409195},{lat: -21.246446, lng: 55.470825},{lat: -21.2030787, lng: 55.2810051},]',
                'start_id' => 2,
                'end_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2019-11-04 03:14:28',
            ),
        ));
        
        
    }
}