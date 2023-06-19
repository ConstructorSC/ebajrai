<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Fruits and Vegetables',
            'slug' => 'fruit',
        ]);

        Category::create([
            'name' => 'Dairy and Egg',
            'slug' => 'dairy',
        ]);

        Category::create([
            'name' => 'Meat and Fish',
            'slug' => 'meat',
        ]);

        Category::create([
            'name' => 'Beverage',
            'slug' => 'beverage',
        ]);
    }
}
