<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\{QuizCategory, FreeTest, Question};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestUploadController extends Controller
{
    public function index()
    {

        $users = User::where('role', '!=', 'Admin')->get();
         $free_quiz_list = DB::table('free_test_master as a')
            ->join('quiz_categories as b', 'a.test_category', '=', 'b.id')
            ->select('a.id', 'a.test_name', 'b.category_name', 'b.id as category_id', 'a.id as test_id')
            ->get();
        $categories = QuizCategory::join('quiz_category_master', 'quiz_category_master.id', '=', 'quiz_categories.category_code')
            ->select('quiz_categories.*', 'quiz_category_master.*')
            ->get();
        //  dd($category);
        return view('Admin.test_upload.free_quiz_index', compact('users', 'categories', 'free_quiz_list'));
    }


    public function question_save(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
            'questions.*.answer_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $existingIds = [];

        foreach ($request->questions as $questionData) {

            // UPDATE
            if (isset($questionData['id'])) {

                $question = Question::find($questionData['id']);
                if ($question) {
                    $question->update([
                        'question' => $questionData['question'],
                        'option_a' => $questionData['option_a'],
                        'option_b' => $questionData['option_b'],
                        'option_c' => $questionData['option_c'],
                        'option_d' => $questionData['option_d'],
                        'correct_answer' => $questionData['correct_answer'],
                        'answer_description' => $questionData['answer_description'],
                    ]);

                    $existingIds[] = $question->id;
                }
            } else {

                // CREATE
                $newQuestion = Question::create([
                    'test_id' => $id,
                    'question' => $questionData['question'],
                    'option_a' => $questionData['option_a'],
                    'option_b' => $questionData['option_b'],
                    'option_c' => $questionData['option_c'],
                    'option_d' => $questionData['option_d'],
                    'correct_answer' => $questionData['correct_answer'],
                    'answer_description' => $questionData['answer_description'],
                ]);

                $existingIds[] = $newQuestion->id;
            }
        }

        // DELETE removed questions
        Question::where('test_id', $id)
            ->whereNotIn('id', $existingIds)
            ->delete();

        return redirect()->back()->with('success', 'Questions saved successfully');
    }

    public function edit($id)
    {

        $users = User::where('role', '!=', 'Admin')->get();
        $test = FreeTest::with('questions')->findOrFail($id);
        $categories = QuizCategory::where('id', $test->test_category)->get();
        return view('Admin.test_upload.free_quiz_edit', compact('users', 'test', 'categories'));
    }

    public function free_quiz()
    {

        $users = User::where('role', '!=', 'Admin')->get();
        $free_quiz_list = DB::table('free_test_master as a')
            ->join('quiz_categories as b', 'a.test_category', '=', 'b.id')
            ->select('a.id', 'a.test_name', 'b.category_name', 'b.id as category_id', 'a.id as test_id')
            ->get();
        $categories = QuizCategory::join('quiz_category_master', 'quiz_category_master.id', '=', 'quiz_categories.category_code')
            ->select('quiz_categories.*', 'quiz_category_master.*')
            ->get();
        return view('Admin.test_upload.free_quiz', compact('users', 'free_quiz_list', 'categories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test_name'  => 'required|string|max:255',
            'url_name'      => 'required|string|max:255|alpha_dash|unique:tests,url_name',
            'test_category' => 'required|exists:quiz_categories,id',
            'token'          => 'required|integer|min:1',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        FreeTest::insert([
            'test_name' => $request->test_name,
            'url_name' => $request->url_name,
            'test_category' => $request->test_category,
            'number_of_token' => $request->token,
        ]);
        return redirect()->route('upload.free-quiz')->with('success', 'Record successfully created');
    }
}
