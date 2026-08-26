<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First create users
        $this->call(UserSeeder::class);

        // Then create tasks for those users
        $this->call(TaskSeeder::class);
    }
}
