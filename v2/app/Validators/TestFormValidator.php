<?php

namespace App\Validators;

use App\Rules\FullName;
use Illuminate\Http\Request;

class TestFormValidator extends FormValidator
{
    private static function validation(Request $request)
    {
        return FormValidator::make($request->all(), [
            'Полное_имя' => ['required', new FullName()],
            'Группа' => 'required',
            'Почта' => 'required|email:rfc,dns',
            'Вопрос_1' => 'required',
            'Вопрос_2' => 'required',
            'Вопрос_3' => 'required',
        ], [
                'required' => 'Поле ":attribute" должно быть заполнено.',
                'regex' => 'Введите номер телефона корректно.',
                'min' => 'Слишком короткий номер телефона.',
                'date' => 'Дата введена неверно.',
                'email' => 'Введите корректную почту (пример: example@email.com).',
            ]);
    }

    public static function validate(Request $request)
    {
        $validation = TestFormValidator::validation($request);

        if ($validation->fails()) {
            return true;
        }

        return false;
    }

    public static function message(Request $request)
    {
        $validation = TestFormValidator::validation($request);

        if ($validation->fails()) {
            return $validation->messages()->get('*');
        }

        return null;
    }
}