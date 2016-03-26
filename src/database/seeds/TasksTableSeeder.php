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
            'title' => 'The force',
            'description' => 'Please brute force this passwd file, use john if you want. Please solve this',
            'category_id' => 6,
            'default_points' => 50,
            'answer' => 'flag{the_flag}',
        ]);

        DB::table('tasks')->insert([
            'title' => 'base64docede',
            'description' => 'please decode this string use base64, I know you can do it',
            'category_id' => 1,
            'default_points' => 50,
            'answer' => 'flag{the_flag}',
        ]);

        DB::table('tasks')->insert([
            'title' => 'caesar cipher',
            'description' => 'cipher replace strings here, hint is the name of an ape',
            'category_id' => 1,
            'default_points' => 50,
            'answer' => 'flag{the_flag}',
        ]);

        DB::table('tasks')->insert([
            'title' => 'sqlInjection',
            'description' => 'can you login as admin',
            'category_id' => 2,
            'default_points' => 50,
            'answer' => 'flag{the_flag}',
       ]);

        DB::table('tasks')->insert([
            'title' => 'androidAPK',
            'description' => 'reverse android APK, apk can be extracted :v',
            'category_id' => 4,
            'default_points' => 50,
            'answer' => 'flag{the_flag}',
        ]);


    }
}
