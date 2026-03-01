<?php

namespace App\Http\Controllers;

use App\Models\FreeTest;
use App\Models\InterviewTest;
use App\Models\QuizList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterSetting;

class HomeController extends Controller
{
    public function home()
    {

        // $latest_quiz = QuizList::latest()->limit(30)->get();

        $latest_quiz = FreeTest::latest()->limit(10)->get();

        $latest_interview_quiz = InterviewTest::latest()->limit(10)->get();


        $token = MasterSetting::first();

        $users = User::where('id', Auth::id())->first();

        // dd($users);

        return view('home', compact('latest_quiz', 'latest_interview_quiz', 'token', 'users'));
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }
    public function contact_us()
    {
        return view('contact_us');
    }
}
