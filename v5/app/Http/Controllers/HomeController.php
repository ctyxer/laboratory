<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $photo = Photo::find(1);

        return view('home.index', [
            'photo' => $photo
        ]);
    }
}
