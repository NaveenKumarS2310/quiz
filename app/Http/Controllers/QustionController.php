<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Excel;
use App\Models\QuizCategory;
use App\Models\QuizList;
use App\Models\QuizListQustion;
use Illuminate\Support\Facades\DB;

class QustionController extends Controller
{
    public function create_exam()
    {
        $category = QuizCategory::where('status', 1)->get();
        return view('create_exam', compact('category'));
    }

    public function add_exam(Request $request)
    {
        $name = $request->name;
        $category = $request->category;
        $numbers = $request->numbers;
        $qustions = $request->qustions;

        $quiz = new QuizList();
        $quiz->name = $name;
        $quiz->category_id = $category;
        $quiz->noq = $numbers;
        $quiz->status = 1;
        $quiz->save();
        $exam_id = $quiz->id;

        $quiz->slug = "question-no-" . $exam_id;
        $quiz->save();

        foreach ($qustions as $da) {
            $qustion = new QuizListQustion();
            $qustion->quiz_list_id = $exam_id;
            $qustion->qustion =  $da[0];
            $qustion->answer =  $da[1];
            $qustion->option1 =  $da[2];
            $qustion->option2 =  $da[3];
            $qustion->option3 =  $da[4];
            $qustion->option4 =  $da[5];
            $qustion->save();
        }

        return array("sratus" => 1, "message" => "Question created Succesfully");
    }

    /* Excel Upload */

    public function upload_qustion()
    {
        $category = QuizCategory::where('status', 1)->get();
        return view('upload_qustion', compact('category'));
    }

    public function exam_pre_upload(Request $request)
    {
        $data = array();
        if ($request->hasFile('file')) {
            $rows = Excel::toArray(new ExcelImport, $request->file('file'));
            foreach ($rows[0] as $index => $row) {
                if ($index != 0) {
                    $data[] = array(
                        "qustion" => $row[1],
                        "option1" => $row[2],
                        "option2" => $row[3],
                        "option3" => $row[4],
                        "option4" => $row[5],
                        "answer" => $row[6]
                    );
                }
            }
        }

        return $data;
    }

    public function question_list()
    {
        if (auth()->user()->role == 'Admin') {
            $quiz_list = QuizList::orderBy("id", "DESC")->paginate(20);
        } else {
            $quiz_list = QuizList::orderBy("id", "DESC")->where('status', 1)->where("created_by", auth()->user()->id)->paginate(20);
        }

        return view('question_list', compact('quiz_list'));
    }

    public function edit_question($id)
    {
        $category = QuizCategory::where('status', 1)->get();
        $quiz = QuizList::find($id);
        $quiz_qustion = QuizListQustion::where("quiz_list_id", $id)->get();
        return view('edit_question', compact('quiz', 'quiz_qustion', 'category'));
    }
    public function question_edit_submit(Request $request)
    {
        $edit_id = $request->edit_id;
        $name = $request->name;
        $category = $request->category;
        $question = $request->question;

        $option1 = $request->option1;
        $option2 = $request->option2;
        $option3 = $request->option3;
        $option4 = $request->option4;

        $quiz = QuizList::find($edit_id);
        $quiz->name = $name;
        $quiz->category_id = $category;
        $quiz->save();

        QuizListQustion::where("quiz_list_id", $edit_id)->delete();

        for ($i = 0; $i < count($question); $i++) {
            $temp_answer = "answer" . $i;
            $answer = $request->$temp_answer;

            $qustion = new QuizListQustion();
            $qustion->quiz_list_id = $edit_id;
            $qustion->qustion =  $question[$i];
            $qustion->answer =  $answer;
            $qustion->option1 =  $option1[$i];
            $qustion->option2 =  $option2[$i];
            $qustion->option3 =  $option3[$i];
            $qustion->option4 =  $option4[$i];
            $qustion->save();
        }

        return redirect('question-list');
    }
    public function delete_question($id)
    {
        QuizListQustion::where("quiz_list_id", $id)->delete();
        $quiz = QuizList::find($id)->delete();
        return redirect('question-list');
    }
}
