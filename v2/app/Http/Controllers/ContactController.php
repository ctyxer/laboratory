<?php

namespace App\Http\Controllers;

use App\Rules\FullName;
use App\Validators\ContactFormValidator;
use App\Validators\FormValidator;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }
    public function store(Request $request)
    {
        $fail = ContactFormValidator::validate($request);

        if ($fail) {
            return redirect()->back()->with('errors', ContactFormValidator::message($request));
        }

        return redirect()->back()->with('message', 'Успешно');
    }
}