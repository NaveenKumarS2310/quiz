<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewTest extends Model
{
     protected $table = "interview_test_master";
     public function questions()
     {
          return $this->hasMany(InterviewQuestion::class, 'test_id');
     }
}
