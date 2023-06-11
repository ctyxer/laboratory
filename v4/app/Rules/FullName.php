<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class FullName implements Rule
{
    public function passes($attribute, $value)
    {
        return count(preg_split('/\s+/', $value)) == 3 && mb_convert_case($value, MB_CASE_TITLE) == $value;
    }

    public function message()
    {
        return 'Необходимо ввести полное ФИО большими буквами.';
    }
}
