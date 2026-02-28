<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewQuestion extends Model
{
   protected $table = "interview_test_question";

    protected $fillable = [
        'test_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'answer_description',
    ];
    public function test()
    {
        return $this->belongsTo(InterviewTest::class, 'test_id');
    }
}
