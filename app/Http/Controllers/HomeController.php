<?php

namespace App\Http\Controllers;

use App\Models\QuizList;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latest_quiz = QuizList::latest()->limit(30)->get();
        return view('home', compact('latest_quiz'));
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
