<?php

use Illuminate\Database\Seeder;
use App\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'IsShop.',
            'description'=>'Confía en nosotros.',
            'logo'=>'logo.png',
            'mail'=>'israelcerveraalvarado@gmail.com',
            'address'=>'8888 Cummings Vista Apt. 101, Susanbury, NY 95473',
            'ruc'=>'05032001',
        ]);
    }
}
