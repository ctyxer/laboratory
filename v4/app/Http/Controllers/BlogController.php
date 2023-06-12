<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Validators\BlogValidator;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $pagination = 12;
        $posts = Post::latest()->paginate($pagination);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Request $request, Post $post)
    {
        return view('blog.show', [
            'post' => $post
        ]);
    }
}