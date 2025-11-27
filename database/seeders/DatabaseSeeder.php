<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PaymentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CartItemSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(ProductVariantSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ShippingAddressSeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(WishlistSeeder::class);
        $this->call(PaymentSeeder::class);

    }
}
