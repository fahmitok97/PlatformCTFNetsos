<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'key' => 'headlineContest',
            'value' => '2',
        ]);

        DB::table('configs')->insert([
            'key' => 'LastWeekContest',
            'value' => '-1',
        ]);

    }
}
