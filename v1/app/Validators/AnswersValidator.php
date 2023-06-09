<?php

namespace App\Validators;

use Illuminate\Http\Request;

class AnswersValidator extends TestFormValidator
{
    public static function score(Request $request) {
        $score = 0;
        $question1 = $request->Вопрос_1;
        $question2 = $request->Вопрос_2;
        $question3 = trim($request->Вопрос_3);

        if($question1 == "boolean") $score++;
        if($question2 == "4") $score++;
        if($question3 == "Ада Лавлейс") $score++;

        return $score;
    }
}