<?php
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Guilbert',
            'firstname' => 'François',
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
            'name' => 'Lanselle',
            'firstname' => 'Fabien',
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
            'name' => 'Estève',
            'firstname' => 'Matthieu',
            'email' => 'matthieu.esteve@groupevitaminet.com',
            'role' => 'admin',
            'parking_id' => '99',
            'password' => bcrypt('admin'),
            'address' => "2 Boulevard Thomson",
            'zipcode' => "59810",
            'city' => "Lesquin",
            'country' => "France",
            'phone' => "03 20 61 70 70",
        ]);
        User::create([
            'name' => 'Decornet',
            'firstname' => 'Olivier',
            'email' => 'olivier.decornet@groupevitaminet.com',
            'role' => 'admin',
            'parking_id' => '99',
            'password' => bcrypt('admin'),
            'address' => "2 Boulevard Thomson",
            'zipcode' => "59810",
            'city' => "Lesquin",
            'country' => "France",
            'phone' => "03 20 61 70 70",
        ]);
        User::create([
            'name' => 'Rolland',
            'firstname' => 'Paul',
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
            'name' => 'Dupont',
            'firstname' => 'Pierre',
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
            'name' => 'Carpentier',
            'firstname' => 'Jacques',
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
            'name' => 'Leroux',
            'firstname' => 'Virginie',
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
            'name' => 'Dufour',
            'firstname' => 'Valérie',
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
            'name' => 'Ledoux',
            'firstname' => 'Rolland',
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
            'name' => 'Dumont',
            'firstname' => 'François',
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
            'name' => 'Hermant',
            'firstname' => 'Stéphane',
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