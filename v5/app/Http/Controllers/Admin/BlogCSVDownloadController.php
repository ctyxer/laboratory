<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class BlogCSVDownloadController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.blog.download.create');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        $request->file('file')->storeAs('temp', 'blog.csv');

        $filePath = storage_path('app/temp/blog.csv');
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file);

        $posts = [];
        while ($row = fgetcsv($file)) {
            $header[0] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $header[0]);
            $posts[] = array_combine($header, $row);
        }

        fclose($file);

        Post::insert($posts);

        return redirect()->route('blog.index');
    }
}