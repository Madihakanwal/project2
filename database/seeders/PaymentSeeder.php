<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'order_id' => 1,
                'payment_method' => 'stripe',
                'transaction_id' => 'TXN-STR-1001',
                'amount' => 2500.50,
                'status' => true,
            ],
            [
                'order_id' => 2,
                'payment_method' => 'paypal',
                'transaction_id' => 'TXN-PAY-1002',
                'amount' => 1450.00,
                'status' => true,
            ],
            [
                'order_id' => 3,
                'payment_method' => 'cod',
                'transaction_id' => 'TXN-COD-1003',
                'amount' => 750.75,
                'status' => false,
            ],
            [
                'order_id' => 4,
                'payment_method' => 'stripe',
                'transaction_id' => 'TXN-STR-1004',
                'amount' => 3200.99,
                'status' => true,
            ],
            [
                'order_id' => 5,
                'payment_method' => 'paypal',
                'transaction_id' => 'TXN-PAY-1005',
                'amount' => 999.00,
                'status' => false,
            ],
            [
                'order_id' => 6,
                'payment_method' => 'cod',
                'transaction_id' => 'TXN-COD-1006',
                'amount' => 1999.49,
                'status' => true,
            ],
            [
                'order_id' => 7,
                'payment_method' => 'stripe',
                'transaction_id' => 'TXN-STR-1007',
                'amount' => 5500.00,
                'status' => true,
            ],
            [
                'order_id' => 8,
                'payment_method' => 'paypal',
                'transaction_id' => 'TXN-PAY-1008',
                'amount' => 1250.10,
                'status' => true,
            ],
            [
                'order_id' => 9,
                'payment_method' => 'stripe',
                'transaction_id' => 'TXN-STR-1009',
                'amount' => 799.99,
                'status' => false,
            ],
            [
                'order_id' => 10,
                'payment_method' => 'cod',
                'transaction_id' => 'TXN-COD-1010',
                'amount' => 1800.00,
                'status' => true,
            ],
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
