<?php

namespace App\Validators;
use Illuminate\Http\Request;
use Validator;

class FormValidator extends Validator
{
    var $errors = [];

    public function fails(Request $request, array $rules) {
        $validation = Validator::make($request->all(), $rules);

        return $validation->fails();
    }

    public function isNotEmpty($data) {
        $data = [
            'data' => $data
        ];

        $validation = Validator::make($data, [
            'data' => 'required'
        ]);

        return !$validation->fails();
    }

    public function isInteger($data) {
        $data = [
            'data' => $data
        ];

        $validation = Validator::make($data, [
            'data' => 'required|integer'
        ]);

        return !$validation->failed();
    }

    public function isLess($data, $value) {
        $this->isInteger($data);

        return $this->isInteger($data) && $data < $value;
    }

    public function isGreater($data, $value) {
        $this->isInteger($data);

        return $this->isInteger($data) && $data > $value;
    }
    
    public function isEmail($data) {
        $data = [
            'data' => $data
        ];

        $validation = Validator::make($data, [
            'data' => 'required|email:rfc,dns'
        ]);

        return !$validation->failed();
    }

    public function wordCount(string $data, int $min): bool {
        return str_word_count($data) > $min; 
    }
}
