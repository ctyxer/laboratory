<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestBookDownloadController extends Controller
{
    public function index()
    {
        return Storage::download('messages/messages.inc');
    }
}