<?php
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'François Guilbert',
            'email' => 'francois.guilbert@neoweb.fr',
            'role' => 'admin',
            'parking_id' => '99',
            'password' => bcrypt('admin'),
            'address' => "165, avenue de Bretagne",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 06 14 17",
        ]);
        User::create([
            'name' => 'Fabien Lanselle',
            'email' => 'fabien.lanselle@neoweb.fr',
            'role' => 'admin',
            'parking_id' => '99',
            'password' => bcrypt('admin'),
            'address' => "165, avenue de Bretagne",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 06 14 17",
        ]);
        User::create([
            'name' => 'Matthieu Estève',
            'email' => 'matthieu.esteve@groupevitaminet.com',
            'parking_id' => '99',
            'password' => bcrypt('admin'),
            'address' => "2 Boulevard Thomson",
            'zipcode' => "59810",
            'city' => "Lesquin",
            'country' => "France",
            'phone' => "03 20 61 70 70",
        ]);
        User::create([
            'name' => 'Olivier Decornet',
            'email' => 'olivier.decornet@groupevitaminet.com',
            'parking_id' => '99',
            'password' => bcrypt('admin'),
            'address' => "2 Boulevard Thomson",
            'zipcode' => "59810",
            'city' => "Lesquin",
            'country' => "France",
            'phone' => "03 20 61 70 70",
        ]);
        User::create([
            'name' => 'Paul Rolland',
            'email' => 'rolland@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'Pierre Dupont',
            'email' => 'dupont@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'Jacques Carpentier',
            'email' => 'carpentier@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'Virginie Leroux',
            'email' => 'leroux@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'Valérie Dufour',
            'email' => 'dufour@chezlui.fr',
            'parking_id' => '3',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'Rolland Ledoux',
            'email' => 'ledoux@chezlui.fr',
            'parking_id' => '3',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'François Dumont',
            'email' => 'dumont@chezlui.fr',
            'parking_id' => '4',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
        User::create([
            'name' => 'Stéphane Hermant',
            'email' => 'hermant@chezlui.fr',
            'parking_id' => '4',
            'password' => bcrypt('user'),
            'address' => "12 rue du lion",
            'zipcode' => "59000",
            'city' => "Lille",
            'country' => "France",
            'phone' => "03 20 03 20 03",
        ]);
    }
}