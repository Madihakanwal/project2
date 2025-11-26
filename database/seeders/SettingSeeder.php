<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            'site_name' => 'My Store',
            'site_description' => 'An example store',
            'currency' => 'USD',
            'items_per_page' => '20',
            'support_email' => 'support@example.com',
            'timezone' => 'UTC',
            'phone' => '+1-555-555-5555',
            'address' => '123 Example St',
            'tax_rate' => '0.15',
            'maintenance_mode' => 'off',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
            ]);
        }
    }
}
