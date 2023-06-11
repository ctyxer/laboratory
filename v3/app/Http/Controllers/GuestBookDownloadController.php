<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestBookDownloadController extends Controller
{
    public function index() {
        return Storage::download('messages/messages.inc');
    }
}
