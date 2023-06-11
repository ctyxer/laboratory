<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineTestAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'count_correct_answers',
        'question_1',
        'question_1_correct',
        'question_2',
        'question_2_correct',
        'question_3',
        'question_3_correct',
    ];
}
