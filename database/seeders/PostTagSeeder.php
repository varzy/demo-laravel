<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        Post::all()->each(function ($post) use ($tags) {
            $randomTags = $tags->random(rand(1, 5));
            $post->tags()->saveMany($randomTags);
        });
    }
}
