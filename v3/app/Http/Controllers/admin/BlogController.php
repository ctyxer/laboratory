<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Validators\BlogValidator;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $fail = BlogValidator::validate($request);

        if ($fail) {
            return redirect()->back()->withErrors(BlogValidator::validation($request))->withInput();
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->exists('image')) {
            $image_name = $post->id . '.' . $request->file('image')->getClientOriginalExtension();
            $image_path = 'storage/images/' . $image_name;

            $post->update([
                'image_path' => $image_path
            ]);

            $request->file('image')->storeAs('public/images', $image_name);
        }

        return redirect()->route('admin.blog.index');
    }
}