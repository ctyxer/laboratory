<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Validators\BlogValidator;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination = 10;
        $posts = Post::latest()->paginate($pagination);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}