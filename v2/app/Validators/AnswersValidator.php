<?php

namespace App\Validators;

use Illuminate\Http\Request;

class AnswersValidator extends TestFormValidator
{
    public static function score(Request $request) {
        $score = 0;
        $question1 = $request->question_1;
        $question2 = $request->question_2;
        $question3 = trim($request->question_3);

        if(AnswersValidator::firstQuestionIsCorrect($question1)) $score++;
        if(AnswersValidator::secondQuestionsCorrect($question2)) $score++;
        if(AnswersValidator::thirdQuestionIsCorrect($question3)) $score++;

        return $score;
    }

    public static function firstQuestionIsCorrect($question): bool{
        return $question == "boolean";
    }

    public static function secondQuestionsCorrect($question): bool{
        return $question == "4";
    }

    public static function thirdQuestionIsCorrect($question): bool{
        return $question == "Ада Лавлейс";
    }
}