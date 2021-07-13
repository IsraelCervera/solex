<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Israel',
            'lastname'=>'Cervera Alvarado',
            'rol'=>'Administrador',
            'email'=>'israelcerveraalvarado@gmail.com',
            'phone'=>'9971186899',
            'address'=>'Calle 13 entre 21 y 23',
            'state'=>'Quintana Roo',
            'cp'=>'77800',
            'password'=>'$2y$10$bIpKdbytfC4KPGPwP.e0gOphOCCU0THXBhEzGyfgzFKN/8qFg0.tS',
        ]);
    }
}
