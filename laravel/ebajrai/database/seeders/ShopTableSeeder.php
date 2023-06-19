<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'id' => '1',
            'desc' => 'Pasar Mini Bajrai is a mini market or grocery shop located in No. 1 Jalan Ampuan, 83000 Batu Pahat, Johor. We provides basic needs by people for their daily life such as food, chicken, meat, sugar, flour, and a variety types of rice, spices and seasonings. Other than that, We also provides frozen foods such as roti canai, donuts and curry puffs.',
            'monThu' => '9.00A.M. - 6.00P.M.',
            'friday' => '8.30A.M. - 12.00P.M., 3.00P.M. - 6.00P.M.',
            'saturday' => '8.00A.M. - 2.00P.M.',
            'location' => 'No. 1 Jalan Ampuan, 83000 Batu Pahat, Johor.',
            'phoneNum' => '07-431 2446',
            'fax' => '07-4342446',
        ]);
    }
}
