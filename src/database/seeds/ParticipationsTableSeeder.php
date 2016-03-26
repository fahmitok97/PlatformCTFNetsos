<?php

use Illuminate\Database\Seeder;

class ParticipationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participations')->insert([
            'user_id' => 1,
            'contest_id' => 1,
        ]);
        DB::table('participations')->insert([
            'user_id' => 2,
            'contest_id' => 1,
        ]);
        DB::table('participations')->insert([
            'user_id' => 3,
            'contest_id' => 1,
        ]);
        DB::table('participations')->insert([
            'user_id' => 1,
            'contest_id' => 2,
        ]);
        DB::table('participations')->insert([
            'user_id' => 5,
            'contest_id' => 2,
        ]);
    }
}
