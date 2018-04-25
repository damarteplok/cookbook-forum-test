<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

        	'name' => 'admin',
        	'password' => bcrypt('admin'),
        	'email' => 'mie.yaminasin@gmail.com',
        	'admin' => 1,
            'thread' => 2,
            'replied' => 3,
        	'avatar' => asset('avatars/avatar.png')

        ]);

        App\User::create([

            'name' => 'Damar Teplok',
            'password' => bcrypt('password'),
            'email' => 'jessicavania7@gmail.com',
            'thread' => 2,
            'replied' => 1,
            'avatar' => asset('avatars/avatar2.png')

        ]);
    }
}
