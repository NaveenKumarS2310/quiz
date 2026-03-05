<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $table = 'quiz_results';

    protected $fillable = [
        'user_id',
        'session_id',
        'quiz_id',
        'quiz_type',
        'total_questions',
        'correct_answers',
        'wrong_answers',
        'skipped_answers',
        'answers_json',
    ];
}
