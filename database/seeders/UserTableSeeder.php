<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->has(Profile::factory())->create([
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password'=>'testtest',
        ]);

        User::factory()->has(Profile::factory())->create([
            'name'=>'rhys05',
            'email'=>'owner@yjblog.com',
            'password'=>'testtest',
            'role_id'=>3,
        ]);

        User::factory()->has(Profile::factory())->create([
            'name'=>'david00',
            'email'=>'david@yjblog.com',
            'password'=>'testtest',
            'role_id'=>2,
        ]);
        
        User::factory(10)->has(Profile::factory())->has(Post::factory(5))->create();
    }
}