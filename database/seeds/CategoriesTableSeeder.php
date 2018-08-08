<?php
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Pressing',
        ]);
        Category::create([
            'name' => 'Blanchisserie',
        ]);
        Category::create([
            'name' => 'Repassage',
        ]);
        Category::create([
            'name' => 'Couture',
        ]);
        Category::create([
            'name' => 'Cordonnerie',
        ]);
        Category::create([
            'name' => 'Nettoyage auto',
        ]);
        Category::create([
            'name' => 'Paniers Maraîchers Bio',
        ]);
    }
}
