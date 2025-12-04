<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comment();
        $c->post_id = 1;
        $c->user_id = 2;
        $c->content = "Spot on!";
        $c->save();

        $c = new Comment();
        $c->post_id = 1;
        $c->user_id = 3;
        $c->content = "Play like that every week and we'll go down!";
        $c->save();

        Comment::factory(50)->create();
    }
}
