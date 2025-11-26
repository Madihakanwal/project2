<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wishlist;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Wishlist::create([
                'user_id' => $faker->numberBetween(1, 5),
                'product_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
