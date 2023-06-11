<?php

namespace App\Http\Controllers;

use App\Models\DisciplineTestAnswers;
use App\Validators\AnswersValidator;
use App\Validators\TestFormValidator;
use Illuminate\Http\Request;

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
            return redirect()->back()->withErrors(TestFormValidator::validation($request))->withInput();
        }

        $score = AnswersValidator::score($request);

        DisciplineTestAnswers::create([
            'full_name' => $request->full_name,
            'count_correct_answers' => $score,
            'question_1' => $request->question_1,
            'question_1_correct' => AnswersValidator::firstQuestionIsCorrect($request->question_1),
            'question_2' => $request->question_2,
            'question_2_correct' => AnswersValidator::secondQuestionsCorrect($request->question_2),
            'question_3' => $request->question_3,
            'question_3_correct' => AnswersValidator::thirdQuestionIsCorrect($request->question_3),
        ]);

        return redirect()->back()->with('message', $score);
    }
}