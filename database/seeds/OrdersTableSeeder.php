<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2018-11-22 08:36:04',
                'updated_at' => '2018-11-22 08:36:04',
                'category_id' => 1,
                'category_name' => 'Pressing',
                'product_id' => 2,
                'product_name' => 'Chemise Pliée',
                'parking_id' => 3,
                'parking_name' => 'Nouveau Siècle',
                'user_id' => 10,
                'user_name' => 'Rolland Ledoux',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 3.0,
                'unit_price' => 4.4,
                'total_price' => 13.2,
                'vat' => 20.0,
                'delay' => 'J+1',
                'status' => 'created',
                'customer_comment' => 'Chemises en soies',
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2018-11-22 08:36:13',
                'updated_at' => '2018-11-22 08:36:13',
                'category_id' => 6,
                'category_name' => 'Nettoyage auto',
                'product_id' => 35,
                'product_name' => '<20mn',
                'parking_id' => 3,
                'parking_name' => 'Nouveau Siècle',
                'user_id' => 10,
                'user_name' => 'Rolland Ledoux',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 2.0,
                'unit_price' => NULL,
                'total_price' => NULL,
                'vat' => 20.0,
                'delay' => 'SUR RDV',
                'status' => 'created',
                'customer_comment' => 'ma voiture est une Golf',
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2018-11-22 08:36:46',
                'updated_at' => '2018-11-22 08:36:46',
                'category_id' => 3,
                'category_name' => 'Repassage',
                'product_id' => 20,
                'product_name' => 'Repassage chemise',
                'parking_id' => 3,
                'parking_name' => 'Nouveau Siècle',
                'user_id' => 10,
                'user_name' => 'Rolland Ledoux',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 3.0,
                'unit_price' => 3.07,
                'total_price' => 9.21,
                'vat' => 20.0,
                'delay' => 'J+3',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2018-11-22 08:38:24',
                'updated_at' => '2018-11-22 08:38:24',
                'category_id' => 7,
                'category_name' => 'Paniers Maraîchers Bio',
                'product_id' => 37,
                'product_name' => 'Selon les bons de commande',
                'parking_id' => 1,
                'parking_name' => 'République',
                'user_id' => 5,
                'user_name' => 'Paul Rolland',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => NULL,
                'total_price' => NULL,
                'vat' => 20.0,
                'delay' => 'CHAQUE SEMAINE',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2018-11-22 08:38:35',
                'updated_at' => '2018-11-22 08:38:35',
                'category_id' => 2,
                'category_name' => 'Blanchisserie',
                'product_id' => 9,
                'product_name' => 'Couette 2 pers',
                'parking_id' => 1,
                'parking_name' => 'République',
                'user_id' => 6,
                'user_name' => 'Pierre Dupont',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => 22.0,
                'total_price' => 22.0,
                'vat' => 20.0,
                'delay' => 'J+3',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2018-11-22 08:38:48',
                'updated_at' => '2018-11-22 08:38:48',
                'category_id' => 3,
                'category_name' => 'Repassage',
                'product_id' => 20,
                'product_name' => 'Repassage chemise',
                'parking_id' => 2,
                'parking_name' => 'Opéra',
                'user_id' => 8,
                'user_name' => 'Virginie Leroux',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 3.0,
                'unit_price' => 3.07,
                'total_price' => 9.21,
                'vat' => 20.0,
                'delay' => 'J+3',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'created_at' => '2018-11-22 08:39:02',
                'updated_at' => '2018-11-22 08:39:02',
                'category_id' => 4,
                'category_name' => 'Couture',
                'product_id' => 22,
                'product_name' => 'Recoudre un bouton',
                'parking_id' => 2,
                'parking_name' => 'Opéra',
                'user_id' => 8,
                'user_name' => 'Virginie Leroux',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 3.0,
                'unit_price' => 1.11,
                'total_price' => 3.33,
                'vat' => 20.0,
                'delay' => 'J+5',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'created_at' => '2018-11-22 08:39:14',
                'updated_at' => '2018-11-22 08:39:14',
                'category_id' => 1,
                'category_name' => 'Pressing',
                'product_id' => 4,
                'product_name' => 'Pantalon',
                'parking_id' => 3,
                'parking_name' => 'Nouveau Siècle',
                'user_id' => 9,
                'user_name' => 'Valérie Dufour',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => 4.8,
                'total_price' => 4.8,
                'vat' => 20.0,
                'delay' => 'J+1',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'created_at' => '2018-11-22 08:39:22',
                'updated_at' => '2018-11-22 08:39:22',
                'category_id' => 1,
                'category_name' => 'Pressing',
                'product_id' => 5,
                'product_name' => 'Veste',
                'parking_id' => 2,
                'parking_name' => 'Opéra',
                'user_id' => 8,
                'user_name' => 'Virginie Leroux',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => 6.9,
                'total_price' => 6.9,
                'vat' => 20.0,
                'delay' => 'J+1',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'created_at' => '2018-11-22 08:39:39',
                'updated_at' => '2018-11-22 08:39:39',
                'category_id' => 5,
                'category_name' => 'Cordonnerie',
                'product_id' => 28,
                'product_name' => 'Talons homme',
                'parking_id' => 3,
                'parking_name' => 'Nouveau Siècle',
                'user_id' => 9,
                'user_name' => 'Valérie Dufour',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => 14.8,
                'total_price' => 14.8,
                'vat' => 20.0,
                'delay' => 'J+3',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'created_at' => '2018-11-22 08:39:56',
                'updated_at' => '2018-11-22 08:39:56',
                'category_id' => 3,
                'category_name' => 'Repassage',
                'product_id' => 20,
                'product_name' => 'Repassage chemise',
                'parking_id' => 4,
                'parking_name' => 'Champ de Mars',
                'user_id' => 11,
                'user_name' => 'François Dumont',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 4.0,
                'unit_price' => 3.07,
                'total_price' => 12.28,
                'vat' => 20.0,
                'delay' => 'J+3',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'created_at' => '2018-11-22 08:40:08',
                'updated_at' => '2018-11-22 08:40:08',
                'category_id' => 7,
                'category_name' => 'Paniers Maraîchers Bio',
                'product_id' => 37,
                'product_name' => 'Selon les bons de commande',
                'parking_id' => 4,
                'parking_name' => 'Champ de Mars',
                'user_id' => 12,
                'user_name' => 'Stéphane Hermant',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => NULL,
                'total_price' => NULL,
                'vat' => 20.0,
                'delay' => 'CHAQUE SEMAINE',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'created_at' => '2018-11-22 08:40:22',
                'updated_at' => '2018-11-22 08:40:22',
                'category_id' => 5,
                'category_name' => 'Cordonnerie',
                'product_id' => 32,
                'product_name' => 'Talons aiguilles',
                'parking_id' => 4,
                'parking_name' => 'Champ de Mars',
                'user_id' => 12,
                'user_name' => 'Stéphane Hermant',
                'user_address' => '12 rue du lion',
                'user_zipcode' => '59000',
                'user_city' => 'Lille',
                'user_country' => 'France',
                'quantity' => 1.0,
                'unit_price' => 7.0,
                'total_price' => 7.0,
                'vat' => 20.0,
                'delay' => 'J+3',
                'status' => 'created',
                'customer_comment' => NULL,
                'feedback' => NULL,
                'invoice_id' => NULL,
            ),
        ));
        
        
    }
}