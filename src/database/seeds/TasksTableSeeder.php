<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => 'case#1',
            'description' => 'ini case1',
            'category_id' => 1,
        ]);
        DB::table('tasks')->insert([
            'title' => 'case#2',
            'description' => 'ini case2',
            'category_id' => 1,
        ]);
    }
}
