<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $methods = ['stripe', 'paypal', 'cod'];

        for ($i = 0; $i < 10; $i++) {
            Payment::create([
                'order_id' => $faker->numberBetween(1, 50),
                'payment_method' => $faker->randomElement($methods),
                'transaction_id' => Str::upper(Str::random(12)),
                'amount' => $faker->randomFloat(2, 10, 500),
                'status' => $faker->randomElement(['completed', 'pending', 'failed']),
            ]);
        }
    }
}
