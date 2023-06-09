<?php

namespace App\Http\Controllers;

use App\Rules\FullName;
use App\Validators\AnswersValidator;
use App\Validators\TestFormValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DisciplineTestController extends Controller
{
    public function index()
    {
        return view('discipline.test.index');
    }

    public function store(Request $request)
    {
        $fail = TestFormValidator::validate($request);

        if ($fail) {
            return redirect()->back()->with('errors', TestFormValidator::message($request));
        }

        return redirect()->back()->with('message', AnswersValidator::score($request));
    }
}