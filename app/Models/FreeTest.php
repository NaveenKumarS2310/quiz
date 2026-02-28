<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class FreeTest extends Model
{
     protected $table = "free_test_master";
    
     public function questions()
     {
          return $this->hasMany(Question::class, 'test_id');
     }
}