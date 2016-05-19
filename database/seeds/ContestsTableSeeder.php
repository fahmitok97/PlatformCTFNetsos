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
            'name' => 'HiddenContest',
            'description' => 'supposed to be hidden',
            'enabled' => 0
        ]);

        DB::table('contests')->insert([
            'name' => 'fortnightCTF#1',
            'description' => 'first ever fortnightCTF',
            'enabled' => 1
        ]);

        DB::table('contests')->insert([
            'name' => 'fortnightCTF#2',
            'description' => 'second fortnightCTF',
            'enabled' => 1
        ]);
    }
}
