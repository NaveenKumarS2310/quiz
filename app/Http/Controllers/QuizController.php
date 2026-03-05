<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\QuizList;
use App\Models\QuizListQustion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{JobCategory, DocumentCategory, NotesCategory, NewsCategory};
use App\Models\{JobUpload, DocumentUpload, NewsUpload, NotesUpload};

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
    public function quiz_result(Request $request)
    {
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

        $existingResult = \App\Models\QuizResult::where([
            'session_id' => session()->getId(),
            'quiz_id' => $quiz->id,
            'quiz_type' => $type,
        ])->first();

        $answers = $request->input('answers', []);
        if (is_string($answers)) {
            $answers = json_decode($answers, true) ?? [];
        }

        if (empty($answers) && $existingResult) {
            $answers = json_decode($existingResult->answers_json, true) ?? [];
        }

        return view('quiz_result', compact('answers', 'quiz', 'qustions', 'type', 'existingResult'));
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
        $answers = $request->input('answers', []);
        if (is_string($answers)) {
            $answers = json_decode($answers, true) ?? [];
        }
        $answer_list = $answers;

        $existingResult = \App\Models\QuizResult::where([
            'session_id' => session()->getId(),
            'quiz_id' => $quiz->id,
            'quiz_type' => $type,
        ])->first();

        // if the result doesn't exist, it means this is the first time they click submit
        // so we save the answers and update tokens
        if (!$existingResult) {
            if (Auth::check()) {
                $user = Auth::user();
                $user->my_tokens = $user->my_tokens + $quiz->number_of_token;
                $user->save();
            }

            $correct_answer = 0;
            $not_answered = 0;
            $wrong_answer = 0;

            foreach ($qustions as $qustion) {
                $selectedAnswer = $answers[$qustion->id] ?? null;
                if ($selectedAnswer === null) {
                    $not_answered++;
                } elseif ($selectedAnswer === $qustion->correct_answer) {
                    $correct_answer++;
                } else {
                    $wrong_answer++;
                }
            }

            \App\Models\QuizResult::create([
                'session_id' => session()->getId(),
                'quiz_id' => $quiz->id,
                'quiz_type' => $type,
                'user_id' => auth()->id(),
                'total_questions' => count($qustions),
                'correct_answers' => $correct_answer,
                'wrong_answers' => $wrong_answer,
                'skipped_answers' => $not_answered,
                'answers_json' => json_encode($answers),
            ]);
        }

        return view('quiz_submit', compact('answer_list', 'quiz', 'qustions', 'type'))->render();
    }
    public function profile(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();


        return view('profile', compact('user'));
    }
    public function latest_notes(Request $request)
    {
         $user = Auth::user();
        $categories  = NotesCategory::all();

        $articles = NotesUpload::orderBy('created_at', 'desc')->paginate(6);

        $page = (int) $request->get('page', 1);

        if ($page < 1 || $page > $articles->lastPage()) {
            return redirect()->route('admin.notes.upload.create.index', ['page' => 1]);
        }
         $article = "";
        return view('notes', compact('categories', 'articles','article','user'));
    }
    public function documents(Request $request)
    {
         $user = Auth::user();
        $categories  = DocumentCategory::all();


        $articles = DocumentUpload::latest()->paginate(20);

       
         $article = "";
        return view('document', compact('categories', 'articles','article','user'));
    }
    public function news(Request $request)
    {
         $user = Auth::user();
        $categories  = NewsCategory::all();

        $articles = NewsUpload::orderBy('created_at', 'desc')->paginate(20);

        $page = (int) $request->get('page', 1);

       
        $article = "";
        return view('news', compact('categories', 'articles','article','user'));
    }
}
