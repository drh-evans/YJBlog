<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Post();
        $p->user_id = 1;
        $p->title = "Today's Game";
        $p->body = "Poor performance in my opinion, lucky";
        $p->like_count = 0;
        $p->save();

        $p = new Post();
        $p->user_id = 1;
        $p->title = "Franco!";
        $p->body = "Stunning goal, Trafford stood no chance";
        $p->like_count = 0;
        $p->save();

        Post::factory(30)->has(Comment::factory(15))->create();
    }
}
