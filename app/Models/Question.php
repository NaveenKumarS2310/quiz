<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FreeTest;

class Question extends Model
{
    protected $table = "free_test_question";

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
        return $this->belongsTo(FreeTest::class, 'test_id');
    }
}