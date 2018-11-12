<?php
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jacques Durand',
            'email' => 'durand@chezlui.fr',
            'role' => 'admin',
            'parking_id' => '1',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'Jean Dupont',
            'email' => 'dupont@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Paul Ince',
            'email' => 'ince@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Pierre Smith',
            'email' => 'smith@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Paul Licata',
            'email' => 'licata@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Jacques Vandaele',
            'email' => 'vandael@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Jean Lars',
            'email' => 'lars@chezlui.fr',
            'parking_id' => '1',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Pierre Louguet',
            'email' => 'louguet@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Paul Cornet',
            'email' => 'cornet@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Pierre Bal',
            'email' => 'bal@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Paul Casper',
            'email' => 'casper@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Jacques Bulle',
            'email' => 'bulle@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
        ]);
        User::create([
            'name' => 'Jean Bichet',
            'email' => 'bichet@chezlui.fr',
            'parking_id' => '2',
            'password' => bcrypt('user'),
        ]);
    }
}