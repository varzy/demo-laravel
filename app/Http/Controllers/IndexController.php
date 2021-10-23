<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::with('author', 'category', 'tags')->paginate(20);
        return view('index.index', compact('posts'));
    }
}
