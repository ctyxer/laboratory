<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Validators\FormValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoAlbumController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('photos.album.index', [
            'photos' => $photos
        ]);
    }
}