<?php

namespace App\Validators;
use Illuminate\Http\Request;
use Validator;

class FormValidator 
{
    public static function check(Request $request, array $rules) {
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return redirect()->back()->with([
                'errors' => $validation->messages()->get('*')
            ]);
        }
    }
}
