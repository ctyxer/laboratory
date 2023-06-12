<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        return $posts->get()->toJson();
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::find($request->id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

        return response(200);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $post = Post::find($request->id);
        $path_of_photo_post = 'public' . str_replace('storage', '', $post->image_path);

        Storage::delete($path_of_photo_post);

        Post::destroy($request->id);

        return response(200);
    }
}