<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestUploadController extends Controller
{
    public function free_quiz()
    {
       
        $users = User::where('role', '!=', 'Admin')->get();
      $free_quiz_list = DB::table('quiz_lists as a')
            ->join('quiz_categories as b', 'a.category_id', '=', 'b.id')
            ->whereNull('a.isPaidExam')
            ->select('a.name', 'b.category_name','b.id as category_id','a.id as test_id')
            ->get();
        return view('Admin.test_upload.free_quiz', compact('users','free_quiz_list'));
    }
}
