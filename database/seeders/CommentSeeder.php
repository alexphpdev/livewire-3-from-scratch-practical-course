<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::get();

        foreach ($posts as $post) {
            $rawComments = Comment::factory()->count(mt_rand(5, 50))->make()->toArray();

            $post->comments()->createMany($rawComments);
        }
    }
}
