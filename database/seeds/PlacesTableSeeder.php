<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('places')->delete();
        
        \DB::table('places')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Saint-Denis de la Réunion, Réunion',
                'address' => 'Saint-Denis, Réunion,',
                'lng' => 55.5136433,
                'lat' => -20.9202586,
                'itinerary_id' => 1,
                'created_at' => '2019-10-15 20:57:57',
                'updated_at' => '2019-10-15 20:57:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Boucan Canot, Réunion',
                'address' => 'Boucan Canot, Saint-Paul, Réunion,',
                'lng' => 55.2273017,
                'lat' => -21.0315639,
                'itinerary_id' => 13,
                'created_at' => '2019-10-15 20:58:03',
                'updated_at' => '2019-10-15 20:58:03',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Temple hindou du Petit Bazar, Chemin de la Chapelle, Réunion',
                'address' => 'Chemin de la Chapelle, Saint-Benoît, Réunion,',
                'lng' => 55.6484717,
                'lat' => -20.9487452,
                'itinerary_id' => 3,
                'created_at' => '2019-10-15 20:58:28',
                'updated_at' => '2019-10-15 20:58:28',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Temple du Colosse, Chemin Colosse, Réunion',
                'address' => 'Chemin Colosse, Saint-Benoît, Réunion,',
                'lng' => 55.6717179,
                'lat' => -20.9366692,
                'itinerary_id' => 3,
                'created_at' => '2019-10-15 20:58:34',
                'updated_at' => '2019-10-15 20:58:34',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Temple Tamoul de Bois Rouge, Réunion',
                'address' => 'Réunion, Saint-Benoît,',
                'lng' => 55.630635,
                'lat' => -20.9170397,
                'itinerary_id' => 3,
                'created_at' => '2019-10-15 20:59:32',
                'updated_at' => '2019-10-15 20:59:32',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Notre Dame des Laves, N2, Piton Sainte-Rose, Réunion',
                'address' => 'N2, Piton Sainte-Rose, Saint-Benoît, Réunion, 97439,',
                'lng' => 55.8241028,
                'lat' => -21.160580799999998,
                'itinerary_id' => 3,
                'created_at' => '2019-10-15 21:01:08',
                'updated_at' => '2019-10-15 21:01:08',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Plage de l\'Hermitage, Boulevard Leconte de Lisle, L\'Ermitage-Les-Bains, Réunion',
                'address' => 'Boulevard Leconte de Lisle, L\'Ermitage-Les-Bains, Saint-Paul, Réunion,',
                'lng' => 55.222319,
                'lat' => -21.0794928,
                'itinerary_id' => 13,
                'created_at' => '2019-10-15 21:02:16',
                'updated_at' => '2019-10-15 21:02:16',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Plage de Grande Anse, Route de Grande Anse, Réunion',
                'address' => 'Route de Grande Anse, Saint-Pierre, Réunion,',
                'lng' => 55.5465209,
                'lat' => -21.368237,
                'itinerary_id' => 6,
                'created_at' => '2019-10-15 21:03:08',
                'updated_at' => '2019-10-15 21:03:08',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Marché de Saint-Paul, Quai Gilbert, Réunion',
                'address' => '10, Quai Gilbert, Saint-Paul, Réunion,',
                'lng' => 55.271937,
                'lat' => -21.006274,
                'itinerary_id' => 12,
                'created_at' => '2019-10-15 21:04:42',
                'updated_at' => '2019-10-15 21:04:42',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Maïdo, Réunion',
                'address' => 'Saint-Paul, Réunion,',
                'lng' => 55.387778,
                'lat' => -21.068889,
                'itinerary_id' => 9,
                'created_at' => '2019-10-15 21:05:11',
                'updated_at' => '2019-10-15 21:05:11',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pas de Bellecombe, Réunion',
                'address' => 'Saint-Benoît, Réunion,',
                'lng' => 55.6894317,
                'lat' => -21.2222188,
                'itinerary_id' => 4,
                'created_at' => '2019-10-15 21:06:04',
                'updated_at' => '2019-10-15 21:06:04',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Cap Méchant, Réunion',
                'address' => 'Saint-Pierre, Réunion,',
                'lng' => 55.7107871,
                'lat' => -21.3756533,
                'itinerary_id' => 12,
                'created_at' => '2019-10-15 21:06:08',
                'updated_at' => '2019-10-15 21:06:08',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Plaine des Sables, Réunion',
                'address' => 'Réunion,',
                'lng' => 55.6634118,
                'lat' => -21.2297636,
                'itinerary_id' => 4,
                'created_at' => '2019-10-15 21:06:49',
                'updated_at' => '2019-10-15 21:06:49',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Route des Laves, Réunion',
                'address' => 'Réunion, Saint-Benoît,',
                'lng' => 55.7983567,
                'lat' => -21.2457707,
                'itinerary_id' => 3,
                'created_at' => '2019-10-15 21:10:17',
                'updated_at' => '2019-10-15 21:10:17',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Cilaos, Réunion',
                'address' => 'Cilaos, Saint-Pierre, Réunion,',
                'lng' => 55.463134,
                'lat' => -21.136617,
                'itinerary_id' => 13,
                'created_at' => '2019-10-15 21:11:42',
                'updated_at' => '2019-10-15 21:11:42',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Salazie, Réunion',
                'address' => 'Saint-Benoît, Réunion,',
                'lng' => 55.5136433,
                'lat' => -21.0447249,
                'itinerary_id' => 7,
                'created_at' => '2019-10-15 21:12:07',
                'updated_at' => '2019-10-15 21:12:07',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Le Voile de la Mariée, Route Departementale 48, Réunion',
                'address' => '423-437, Route Departementale 48, Saint-Benoît, Réunion,',
                'lng' => 55.5377036,
                'lat' => -21.0395544,
                'itinerary_id' => 7,
                'created_at' => '2019-10-15 21:12:38',
                'updated_at' => '2019-10-15 21:12:38',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Cirque de Mafate, Réunion',
                'address' => 'Saint-Paul, Réunion,',
                'lng' => 55.4272377,
                'lat' => -21.0499146,
                'itinerary_id' => 11,
                'created_at' => '2019-10-15 21:14:17',
                'updated_at' => '2019-10-15 21:14:17',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Hell-Bourg, Réunion',
                'address' => 'Hell-Bourg, Saint-Benoît, Réunion,',
                'lng' => 55.5164145,
                'lat' => -21.05833,
                'itinerary_id' => 7,
                'created_at' => '2019-10-15 21:14:21',
                'updated_at' => '2019-10-15 21:14:21',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Saint-Pierre, Réunion',
                'address' => 'Saint-Pierre, Réunion,',
                'lng' => 55.5025595,
                'lat' => -21.3222914,
                'itinerary_id' => 12,
                'created_at' => '2019-10-15 21:15:28',
                'updated_at' => '2019-10-15 21:15:28',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Souffleur, Piton Saint-Leu, Saint-Paul, Réunion',
                'address' => 'Piton Saint-Leu, Saint-Paul, Réunion,',
                'lng' => 55.2926385,
                'lat' => -21.2246156,
                'itinerary_id' => 12,
                'created_at' => '2019-10-15 21:15:48',
                'updated_at' => '2019-10-15 21:15:48',
            ),
            21 => 
            array (
                'id' => 25,
                'name' => 'Piton des Neiges, Réunion',
                'address' => 'Saint-Benoît, Réunion,',
                'lng' => 55.4802704,
                'lat' => -21.0992849,
                'itinerary_id' => 5,
                'created_at' => '2019-10-15 21:20:54',
                'updated_at' => '2019-10-15 21:20:54',
            ),
            22 => 
            array (
                'id' => 26,
                'name' => 'Le Gouffre de l\'Étang-Salé, Rue Des Olivines, l\'Étang-Salé les Bains, Réunion',
                'address' => '3, Rue Des Olivines, l\'Étang-Salé les Bains, Saint-Pierre, Réunion, 97410,',
                'lng' => 55.3409195,
                'lat' => -21.2801323,
                'itinerary_id' => 13,
                'created_at' => '2019-10-15 21:21:41',
                'updated_at' => '2019-10-15 21:21:41',
            ),
            23 => 
            array (
                'id' => 27,
                'name' => 'Point de vue du Trou de Fer, Réunion',
                'address' => 'Saint-Benoît, Réunion,',
                'lng' => 55.5585675,
                'lat' => -21.0438651,
                'itinerary_id' => 10,
                'created_at' => '2019-10-15 21:24:36',
                'updated_at' => '2019-10-15 21:24:36',
            ),
            24 => 
            array (
                'id' => 28,
                'name' => 'Gîte de Bélouve, Route Forestière 2 de Bébour-Bélouve, Réunion',
                'address' => 'Route Forestière 2 de Bébour-Bélouve, Saint-Benoît, Réunion,',
                'lng' => 55.5363133,
                'lat' => -21.0610271,
                'itinerary_id' => 10,
                'created_at' => '2019-10-15 21:24:41',
                'updated_at' => '2019-10-15 21:24:41',
            ),
            25 => 
            array (
                'id' => 30,
                'name' => 'Entre-Deux, Réunion',
                'address' => 'Entre-Deux, Saint-Pierre, Réunion,',
                'lng' => 55.470825,
                'lat' => -21.246446,
                'itinerary_id' => 13,
                'created_at' => '2019-11-04 03:06:49',
                'updated_at' => '2019-11-04 03:06:49',
            ),
            26 => 
            array (
                'id' => 31,
                'name' => 'Pointe au Sel Ou Pointe de Bretagne, Réunion',
                'address' => 'Saint-Paul, Réunion,',
                'lng' => 55.2810051,
                'lat' => -21.2030787,
                'itinerary_id' => 13,
                'created_at' => '2019-11-04 03:06:57',
                'updated_at' => '2019-11-04 03:06:57',
            ),
            27 => 
            array (
                'id' => 32,
                'name' => 'Bassin des Aigrettes, Réunion',
                'address' => 'Saint-Paul, Réunion,',
                'lng' => 55.247083,
                'lat' => -21.045139,
                'itinerary_id' => 1,
                'created_at' => '2019-11-04 03:07:56',
                'updated_at' => '2019-11-04 03:07:56',
            ),
            28 => 
            array (
                'id' => 33,
                'name' => 'Belvédère de Bois Court, D70, La Plaine des Cafres, Réunion',
                'address' => 'D70, La Plaine des Cafres, Saint-Pierre, Réunion,',
                'lng' => 55.5368704,
                'lat' => -21.1904127,
                'itinerary_id' => 1,
                'created_at' => '2019-11-04 03:08:49',
                'updated_at' => '2019-11-04 03:08:49',
            ),
            29 => 
            array (
                'id' => 34,
                'name' => 'Cap Noir, La Possession, Réunion',
                'address' => 'La Possession, Saint-Paul, Réunion,',
                'lng' => 55.3897488,
                'lat' => -20.9930591,
                'itinerary_id' => 1,
                'created_at' => '2019-11-04 03:10:35',
                'updated_at' => '2019-11-04 03:10:35',
            ),
            30 => 
            array (
                'id' => 35,
                'name' => 'Fenêtre des Makes, D 20, Réunion',
                'address' => 'D 20, Saint-Pierre, Réunion,',
                'lng' => 55.4330234,
                'lat' => -21.1853877,
                'itinerary_id' => 1,
                'created_at' => '2019-11-04 03:12:03',
                'updated_at' => '2019-11-04 03:12:03',
            ),
        ));
        
        
    }
}