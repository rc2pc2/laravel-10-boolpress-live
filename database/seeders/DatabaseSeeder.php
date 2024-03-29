<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UserDetailSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            CategorySeeder::class,
            CategoryDetailSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            PostTagSeeder::class,
        ]);
    }
}
