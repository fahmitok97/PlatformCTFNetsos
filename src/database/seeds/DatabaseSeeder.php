<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(ContestsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(ContestTaskTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ParticipationsTableSeeder::class);
    }
}
