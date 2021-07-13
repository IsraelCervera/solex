<?php

use Illuminate\Database\Seeder;
use App\PaymentPlatform;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
        	'name' => 'PayPal',
        	'image' => 'img/payment-platforms/paypal.jpg',
        ]);
    }
}
