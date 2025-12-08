<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\QuizList;
use App\Models\QuizListQustion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quiz()
    {
        $latest_quiz = QuizList::latest()->limit(10)->get();
        $quiz_categories = QuizCategory::where('status', 1)->get();
        return view('quiz', compact('quiz_categories', 'latest_quiz'));
    }

    public function quiz_category($slug)
    {
        $quiz_category = QuizCategory::where('category_name', $slug)->first();
        if(!$quiz_category)
        {
            return redirect(url('/'));
        }
        
        $category_quiz = QuizList::where("category_id", $quiz_category->id)->orderBy('created_at', 'desc')->get();
        return view('quiz_category', compact('quiz_category', 'category_quiz'));

    }

    public function quiz_overview($slug)
    {
        $quiz = QuizList::where('slug', $slug)->orWhere('name', $slug)->first();
        if ($quiz == null) {
            return redirect(url('/'));
        }
        return view('quiz_overview', compact('quiz'));
    }

    public function quiz_start($quiz_id)
    {
        $quiz = QuizList::find($quiz_id);
        $noq = $quiz->noq;
        $exam_end_time = date("Y-m-d H:i:s", strtotime("+" . $noq . " minutes"));

        session(['exam_end_time' => $exam_end_time]);
        session(['quiz_id' => $quiz_id]);

        return redirect(url('quiz/' . $quiz->slug . '/' . '1'));
    }

    public function qustion_view($slug, $qust_no)
    {
        $quiz = QuizList::where('slug', $slug)->orWhere('name', $slug)->first();
        if ($quiz == null) {
            return redirect(url('/'));
        }
        $qustions = QuizListQustion::where('quiz_list_id', $quiz->id)->orderBy('id', "DESC")->skip($qust_no - 1)->first();
        if (!$qustions) {
            return redirect(url('quiz_result'));
        }
        return view('qustion_view', compact('quiz', 'qustions', 'qust_no'));
    }

    public function single_qustion_submit($slug, Request $request)
    {
        $answer_list = [];
        if ($request->session()->has('answer_list')) {
            $answer_list = session('answer_list');
        }
        $answer_list[$request->qustion_id] = $request->answer;
        session(['answer_list' => $answer_list]);

        $return_url = url('quiz') . "/" . $slug . "/" . ($request->index_value + 1);
        return redirect($return_url);
    }

    public function quiz_result(Request $request)
    {
        $answer_list = [];
        if ($request->session()->has('answer_list')) {
            $answer_list = session('answer_list');
        }
        $quiz = QuizList::where('id', session('quiz_id'))->first();
        $qustions = QuizListQustion::where('quiz_list_id', $quiz->id)->orderBy('id', "DESC")->get();

        return view('quiz_result', compact('answer_list', 'quiz', 'qustions'));
    }

    public function quiz_submit(Request $request)
    {
        $answer_list = [];
        if ($request->session()->has('answer_list')) {
            $answer_list = session('answer_list');
        }
        $quiz = QuizList::where('id', session('quiz_id'))->first();
        $qustions = QuizListQustion::where('quiz_list_id', $quiz->id)->orderBy('id', "DESC")->get();

        return view('quiz_submit', compact('answer_list', 'quiz', 'qustions'));
    }
    
    public function profile(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        
        // Pass the user data to the 'profile' view
        return view('profile', compact('user'));
    }

    
    

}
