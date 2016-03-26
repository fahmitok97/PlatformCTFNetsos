<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i < 5; $i++):

        DB::table('users')->insert([
            'username' => 'user' . $i,
            'fullname' => str_random(8),
            'email' => 'user' . $i .'@mail.com',
            'password' => bcrypt('secret'),
        ]);

    	endfor;
    }
}
