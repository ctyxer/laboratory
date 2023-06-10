<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuestBookController extends Controller
{
    public function index()
    {
        $messages = Storage::get('messages/messages.inc');
        $messages = json_decode($messages);
        $messages = array_reverse($messages);

        return view('guest.book.index', [
            'messages' => $messages
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $messages = json_decode(Storage::get('messages/messages.inc'));

        array_push($messages, [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'date' => date('Y-m-d H:i:s'),
            'message' => $request->message
        ]);

        Storage::put('messages/messages.inc', json_encode($messages));

        return redirect()->back();
    }
}