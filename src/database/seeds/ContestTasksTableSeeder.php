<?php

use Illuminate\Database\Seeder;

class ContestTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contest_tasks')->insert([
        	'contest_id' => 1,
        	'task_id' => 1,
        	'points' => 50,
        ]);

        DB::table('contest_tasks')->insert([
            'contest_id' => 1,
            'task_id' => 2,
            'points' => 150,
        ]);

        DB::table('contest_tasks')->insert([
            'contest_id' => 1,
            'task_id' => 3,
            'points' => 100,
        ]);

        DB::table('contest_tasks')->insert([
            'contest_id' => 1,
            'task_id' => 4,
            'points' => 200,
        ]);

        DB::table('contest_tasks')->insert([
            'contest_id' => 1,
            'task_id' => 5,
            'points' => 350,
        ]);
    }
}
