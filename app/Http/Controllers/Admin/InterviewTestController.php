<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\{ InterviewQuestion,InterviewTest,InterviewCategory};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InterviewTestController extends Controller
{
        public function index()
    {
         $users = User::where('role', '!=', 'Admin')->get();
        $free_interview_test = DB::table('interview_test_master as a')
            ->join('interview_categories as b', 'a.test_category', '=', 'b.id')
            ->select('a.id', 'a.test_name', 'b.category_name', 'b.id as category_id', 'a.id as test_id')
            ->get();
       ;
        return view('Admin.interview_test.index', compact('users', 'free_interview_test'));      
    }
    public function create()
    {
        $categories = InterviewCategory::where('status', 1)->get();
        $users = User::where('role', '!=', 'Admin')->get();

        return view('Admin.interview_test.create', compact('categories', 'users'));

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test_name'  => 'required|string|max:255|unique:interview_test_master,test_name',
            'url_name'      => 'required|string|max:255|alpha_dash|unique:interview_test_master,url_name',
            'test_category' => 'required|exists:interview_categories,id',
            'token'          => 'required|integer|min:1',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        InterviewTest::insert([
            'test_name' => $request->test_name,
            'url_name' => $request->url_name,
            'test_category' => $request->test_category,
            'number_of_token' => $request->token,
        ]);
        return redirect()->route('upload.free-interview.index')->with('success', 'Record successfully created');
    }
    public function edit($id)
    {

        $users = User::where('role', '!=', 'Admin')->get();
        $test = InterviewTest::with('questions')->findOrFail($id);
        $categories = InterviewCategory::where('id', $test->test_category)->get();
        return view('Admin.interview_test.edit', compact('users', 'test', 'categories'));
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

                $question = InterviewQuestion::find($questionData['id']);
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
                $newQuestion = InterviewQuestion::create([
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
        InterviewQuestion::where('test_id', $id)
            ->whereNotIn('id', $existingIds)
            ->delete();

        return redirect()->back()->with('success', 'Questions saved successfully');
    }
}
    