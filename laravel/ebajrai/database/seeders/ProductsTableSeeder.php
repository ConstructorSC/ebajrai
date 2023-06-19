<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Whole Fresh Chicken',
            'slug' => 'chicken',
            'description' => 'This product is fresh from the farm, freshly packed and selected full grown chicken, HALAL - Malaysia.',
            'packing' => '1.5 - 1.6 kg for each whole chicken',
            'price' => 16.50,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Chicken.jpg',
            'category_id' => 3,
            'productPlacement' => 'Freezer 1',
        ]);

        Product::create([
            'name' => 'Fresh Beef',
            'slug' => 'beef',
            'description' => 'This product is fresh from local farm and freshly packed beef, HALAL - Malaysia.',
            'packing' => '1 kg for one packet of beef',
            'price' => 21.90,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Meet.jpg',
            'category_id' => 3,
            'productPlacement' => 'Freezer 2',
        ]);

        Product::create([
            'name' => 'Red Apple',
            'slug' => 'apple',
            'description' => 'This product is fresh from the farm, freshly selected medium size red apples, Makanan Selamat Tanggungjawab Industri (MeSTI).',
            'packing' => '70 - 100 grams for an apple',
            'price' => 0.90,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Apple.jpg',
            'category_id' => 1,
            'productPlacement' => 'Freezer 3',
        ]);

        Product::create([
            'name' => 'Organic Banana',
            'slug' => 'banana',
            'description' => 'This product is freshly selected organic bananas, Makanan Selamat Tanggungjawab Industri (MeSTI).',
            'packing' => '1.0 - 1.3 kg for a bundle of bananas',
            'price' => 5.90,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Banana.jpg',
            'category_id' => 1,
            'productPlacement' => 'Rack 1-a',
        ]);

        Product::create([
            'name' => 'Coca Cola Can',
            'slug' => 'cocacola',
            'description' => 'This product is a carbonated drinks that contained caffeince and also known as Worlds popular carbonated soft drink. It is excellent to have after the luncheon.',
            'packing' => '250 mL for a can',
            'price' => 1.70,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'CocaCola.jpg',
            'category_id' => 4,
            'productPlacement' => 'Refrigerator 1-a',
        ]);

        Product::create([
            'name' => 'Egg Grade A',
            'slug' => 'eggA',
            'description' => 'This product is an A graded chicken eggs that are graded according to the size of the cell which have thick white and high and round yolks.',
            'packing' => '66.7 - 71.6 grams for a pieces',
            'price' => 13.50,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'EggGredA.jpg',
            'category_id' => 2,
            'productPlacement' => 'Rack 2-a',
        ]);

        Product::create([
            'name' => 'Egg Grade B',
            'slug' => 'eggB',
            'description' => 'This product is an B graded chicken eggs that are graded according to the size of the cell which have thinner whites and wider yolks.',
            'packing' => '50.0 - 58.2 grams for a piece',
            'price' => 11.50,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'EggGredB.jpg',
            'category_id' => 2,
            'productPlacement' => 'Rack 2-b',
        ]);

        Product::create([
            'name' => 'Fresh Salad',
            'slug' => 'salad',
            'description' => 'This product is a hybrid lettuce looks as good as it tastes, producing large, curly leaves with a buttery flavor that is fresh from the garden, freshly selected.',
            'packing' => '100 - 250 grams for a packet',
            'price' => 6.50,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Salad.jpg',
            'category_id' => 1,
            'productPlacement' => 'Rack 1-b',
        ]);

        Product::create([
            'name' => 'Fresh Mustard Leaf/Sawi',
            'slug' => 'sawi',
            'description' => 'This product is have broad, wavy frilled leave with longitudinal veins and deep green color that are freshly selected from the garden.',
            'packing' => '100 - 250 grams for a packet',
            'price' => 2.00,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Sawi.jpg',
            'category_id' => 1,
            'productPlacement' => 'Rack 1-b',
        ]);

        Product::create([
            'name' => 'Asian Sea Bass / Ikan Siakap',
            'slug' => 'ikansiakap',
            'description' => 'This product is freshly picked from the sea, Makanan Selamat Tanggungjawab Industri (MeSTI).',
            'packing' => '700 - 900 grams for one piece',
            'price' => 14.90,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'AsianSeaBass.jpg',
            'category_id' => 3,
            'productPlacement' => 'Freezer 3-a',
        ]);

        Product::create([
            'name' => 'Red Snapper / Ikan Merah',
            'slug' => 'ikanmerah',
            'description' => 'This product is freshly picked from the sea, Makanan Selamat Tanggungjawab Industri (MeSTI).',
            'packing' => '700 - 900 grams for one piece',
            'price' => 28.00,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'RedSnapper.jpg',
            'category_id' => 3,
            'productPlacement' => 'Freezer 3-b',
        ]);

        Product::create([
            'name' => 'Red Watermelon',
            'slug' => 'watermelon',
            'description' => 'This product is freshly selected red watermelon from local farm, Makanan Selamat Tanggungjawab Industri (MeSTI).',
            'packing' => '1.4 - 1.8 kg for one piece',
            'price' => 6.20,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Watermelon.jpg',
            'category_id' => 1,
            'productPlacement' => 'Rack 1-a',
        ]);

        Product::create([
            'name' => 'Potato',
            'slug' => 'potato',
            'description' => 'This product is fresh from local farm, freshly selected good potatos, Makanan Selamat Tanggungjawab Industri (MeSTI).',
            'packing' => '1 kg (7 - 9 pcs) for one packet of potatos',
            'price' => 2.90,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'Potato.jpg',
            'category_id' => 1,
            'productPlacement' => 'Rack 1-b',
        ]);

        Product::create([
            'name' => 'Cactus Natural Mineral Water',
            'slug' => 'water',
            'description' => 'This product is a underground mineral water from pure and clean natural water sources that is hygienically filtered and bottled in accordance to international standards for your peace of minds.',
            'packing' => '5.5L for a bottle',
            'price' => 6.20,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'MineralWater.jpg',
            'category_id' => 4,
            'productPlacement' => 'Refrigerator 1-b',
        ]);

        Product::create([
            'name' => 'Tropicana Twister Orange',
            'slug' => 'tropicana',
            'description' => 'This product is a real fruit juice and pulp that have no artificial coloring or added preservatives in order to offers a fine natural taste.',
            'packing' => '1.5L for a bottle',
            'price' => 5.90,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'TropicanaTwister.jpg',
            'category_id' => 4,
            'productPlacement' => 'Refrigerator 1-c',
        ]);

        Product::create([
            'name' => 'Salted Egg',
            'slug' => 'saltedegg',
            'description' => 'This product is an Asian preserved food product made by soaking duck eggs in brin or packing each egg in damp, salted charcoal.',
            'packing' => '50 - 70 grams for a piece',
            'price' => 9.00,
            'stock_status' => 'instock',
            'quantity' => 30,
            'image' => 'SaltedEgg.jpg',
            'category_id' => 2,
            'productPlacement' => 'Rack 2-c',
        ]);
    }
}
