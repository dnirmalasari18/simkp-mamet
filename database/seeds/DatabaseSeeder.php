<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CorpsTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
    }
}
