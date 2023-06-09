<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestBookController extends Controller
{
    public function index() {
        return view('guest.book.index', [
            'pages' => [
                
            ]
        ]);
    } 

    public function store () {
        
    }
}
