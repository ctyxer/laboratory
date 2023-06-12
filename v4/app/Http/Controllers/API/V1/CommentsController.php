<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index(Post $post)
    {
        return view('comments.index', [
            'comments' => $post->comments()
        ])->render();
    }

    public function store(Request $request, Post $post){
        $request->validate([
            'text' => 'required'
        ]);

        Comment::create([
            'author_id' => $request->author_id,
            'post_id' => $post->id,
            'text' => $request->text
        ]);

        return response(200);
    }
}