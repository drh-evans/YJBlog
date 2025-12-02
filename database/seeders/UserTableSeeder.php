<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name'=>'rhys05',
            'email'=>'owner@yjblog.com',
            'password'=>'testtest',
            'role_id'=>3,
        ]);
        
        User::factory(10)->has(Post::factory(15))->create();
    }
}