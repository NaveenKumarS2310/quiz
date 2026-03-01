<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\QuizList;
use App\Models\QuizListQustion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function quiz()
    {
        // $latest_quiz = QuizList::latest()->limit(10)->get();
        $latest_quiz = DB::table('free_test_master')->latest()->limit(10)->get();

        $latest_interview = DB::table('interview_test_master')->latest()->limit(10)->get();

        $quiz_categories = DB::table('quiz_categories')->where('status', 1)->get();
        $interview_categories = DB::table('interview_categories')->where('status', 1)->get();

        return view('quiz', compact('quiz_categories', 'latest_quiz', 'interview_categories', 'latest_interview'));
    }

    public function quiz_category($type, $id)
    {
        if ($type == 'quiz_exam') {
            $quiz_category = DB::table('quiz_categories')->where('id', $id)->first();
        } else {
            $quiz_category = DB::table('interview_categories')->where('id', $id)->first();
        }

        if (!$quiz_category) {
            return redirect(url('/'));
        }

        if ($type == 'quiz_exam') {
            $category_quiz = DB::table('free_test_master')->where("test_category", $quiz_category->id)->orderBy('created_at', 'desc')->get();
        } else {
            $category_quiz = DB::table('interview_test_master')->where("test_category", $quiz_category->id)->orderBy('created_at', 'desc')->get();
        }
        return view('quiz_category', compact('quiz_category', 'category_quiz', 'type'));
    }

    public function quiz_overview($type, $id)
    {
        // $quiz = QuizList::where('slug', $slug)->orWhere('name', $slug)->first();
        if ($type == 'quiz_exam') {
            $quiz = DB::table('free_test_master')->where('id', $id)->first();
        } else {
            $quiz = DB::table('interview_test_master')->where('id', $id)->first();
        }
        if ($quiz == null) {
            return redirect(url('/'));
        }
        return view('quiz_overview', compact('quiz', 'type'));
    }

    public function quiz_start($type, $id)
    {
        // $quiz = QuizList::find($quiz_id);
        if ($type == 'quiz_exam') {
            $quiz = DB::table('free_test_master')->where('id', $id)->first();
        } else {
            $quiz = DB::table('interview_test_master')->where('id', $id)->first();
        }
        if (Auth::check()) {
            if ($quiz->number_of_token > Auth::user()->my_tokens) {
                return redirect(url('/'))->with('error', 'You do not have enough tokens to start this quiz.');
            }
        } else {
            $token = 0;
            if ($quiz->number_of_token > $token) {
                return redirect(url('/'))->with('error', 'You do not have enough tokens to start this quiz.');
            }
        }

        if ($type == 'quiz_exam') {
            $quiz_question = DB::table('free_test_question')->where('test_id', $id)->get();
        } else {
            $quiz_question = DB::table('interview_test_question')->where('test_id', $id)->get();
        }

        if (Auth::check()) {
            $user = Auth::user();
            $user->my_tokens = $user->my_tokens - $quiz->number_of_token;
            $user->save();
        }



        $noq = $quiz_question->count();
        $exam_end_time = date("Y-m-d H:i:s", strtotime("+" . $noq . " minutes"));

        session(['exam_end_time' => $exam_end_time]);
        session(['quiz_id' => $id]);

        return redirect(url('quiz/' . $type . '/' . $id . '/' . '1'));
    }

    public function qustion_view($type, $id, $qust_no)
    {
        if ($type == 'quiz_exam') {
            $quiz = DB::table('free_test_master')->where('id', $id)->first();
        } else {
            $quiz = DB::table('interview_test_master')->where('id', $id)->first();
        }
        if ($quiz == null) {
            return redirect(url('/'));
        }
        if ($type == 'quiz_exam') {
            $qustions = DB::table('free_test_question')->where('test_id', $id)->get();
        } else {
            $qustions = DB::table('interview_test_question')->where('test_id', $id)->get();
        }

        return view('qustion_view', compact('quiz', 'qustions', 'type'));
    }

    // public function single_qustion_submit($slug, Request $request)
    // {
    //     $answer_list = [];
    //     if ($request->session()->has('answer_list')) {
    //         $answer_list = session('answer_list');
    //     }
    //     $answer_list[$request->qustion_id] = $request->answer;
    //     session(['answer_list' => $answer_list]);

    //     $return_url = url('quiz') . "/" . $slug . "/" . ($request->index_value + 1);
    //     return redirect($return_url);
    // }

    public function quiz_result(Request $request)
    {
        // dd($request->all());
        // $answer_list = [];
        // if ($request->session()->has('answer_list')) {
        //     $answer_list = session('answer_list');
        // }
        $type = $request->type;
        if ($type == 'quiz_exam') {
            $quiz = DB::table('free_test_master')->where('id', $request->quiz_id)->first();
        } else {
            $quiz = DB::table('interview_test_master')->where('id', $request->quiz_id)->first();
        }
        if ($type == 'quiz_exam') {
            $qustions = DB::table('free_test_question')->where('test_id', $quiz->id)->orderBy('id', "DESC")->get();
        } else {
            $qustions = DB::table('interview_test_question')->where('test_id', $quiz->id)->orderBy('id', "DESC")->get();
        }
        $answers = $request->answers;

        return view('quiz_result', compact('answers', 'quiz', 'qustions', 'type'));
    }

    public function quiz_submit(Request $request)
    {
        $answer_list = [];
        if ($request->session()->has('answer_list')) {
            $answer_list = session('answer_list');
        }
        $type = $request->type;
        if ($type == 'quiz_exam') {
            $quiz = DB::table('free_test_master')->where('id', $request->quiz_id)->first();
        } else {
            $quiz = DB::table('interview_test_master')->where('id', $request->quiz_id)->first();
        }
        if ($type == 'quiz_exam') {
            $qustions = DB::table('free_test_question')->where('test_id', $quiz->id)->orderBy('id', "DESC")->get();
        } else {
            $qustions = DB::table('interview_test_question')->where('test_id', $quiz->id)->orderBy('id', "DESC")->get();
        }

        return view('quiz_submit', compact('answer_list', 'quiz', 'qustions', 'type'));
    }

    public function profile(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Pass the user data to the 'profile' view
        return view('profile', compact('user'));
    }
}
