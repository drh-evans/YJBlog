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
        $this->call(UserTableSeeder::class);
        $this->call(StadiumTableSeeder::class);
        $this->call(ClubTableSeeder::class);
        $this->call(FixtureTableSeeder::class);
        $this->call(PlayerTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
    }
}
