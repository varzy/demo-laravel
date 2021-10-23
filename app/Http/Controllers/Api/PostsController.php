<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return Post::with('author', 'category', 'tags')->paginate();
    }

    public function store(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();
        $post->tags()->sync($request->input('tags'));

        return $post->load('category', 'author', 'tags');
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        $post->save();
        $post->tags()->sync($request->input('tags'));

        return $post->load('category', 'author', 'tags');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return $post;
    }
}
