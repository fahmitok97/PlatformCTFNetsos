<?php

use Illuminate\Database\Seeder;

class ContestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contests')->insert([
            'title' => 'fortnightCTF#1',
            'description' => 'first ever fortnightCTF',
        ]);

        DB::table('contests')->insert([
            'title' => 'fortnightCTF#2',
            'description' => 'second fortnightCTF',
        ]);
    }
}
