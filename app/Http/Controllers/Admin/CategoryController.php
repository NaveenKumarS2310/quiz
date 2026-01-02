<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{QuizCategory, QuizCategoryMaster};
use App\Models\{InterviewCategory,NewsCategory};
use App\Models\{DocumentCategory,JobCategory};
use App\Models\{NotesCategory};


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
class CategoryController extends Controller
{
    // Quiz
    public function Quiz_index()
    {
        $master_categories = QuizCategoryMaster::all();
        $categories = QuizCategory::join('quiz_category_master', 'quiz_category_master.id', '=', 'quiz_categories.category_code')
            ->select('quiz_categories.*', 'quiz_category_master.*','quiz_categories.id as record_id')
            ->get();
        if (Route::currentRouteName() === "admin.quiz.category.edit.index") {
            $categoryId = $_GET['id'];
            $category =  QuizCategory::join('quiz_category_master', 'quiz_category_master.id', '=', 'quiz_categories.category_code')
                ->select('quiz_categories.*', 'quiz_category_master.*')
                ->where('quiz_categories.id', $categoryId)
                ->first();
        } else {
            $category = "";
        }
        // dd($categories);
        return view('Admin.Masters.quiz-category', compact('categories', 'master_categories','category'));
    }
    public function Quiz_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'  => 'required',
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.quiz.category.create.store') {
            QuizCategory::insert([
                'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.quiz.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.quiz.category.edit.store') {
            QuizCategory::where('id',$request->id)->update([
                'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.quiz.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Quiz_status_update(Request $request){
        $re = QuizCategory::where('id',$request->id)->first();
        if(!$re){
            return response()->json(['No data'],404);
        }
        // dd($request->id);
        QuizCategory::where('id',$request->id)->update([
                'status' => $request->status,
        ]);

        return response()->json(['status'=>'success','data'=>$request->status],200);
    }

    ///Interview

    public function Interview_index()
    {
        $categories = InterviewCategory::all();

        if (Route::currentRouteName() === "admin.interview.category.edit.index") {
            $categoryId = $_GET['id'];
            $category =  InterviewCategory::where('id', $categoryId)
                ->first();
        } else {
            $category = "";
        }
        // dd($categories);
        return view('Admin.Masters.interview-category', compact('categories', 'category'));
    }
    public function Interview_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'category'  => 'required',
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.interview.category.create.store') {
            InterviewCategory::insert([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.interview.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.interview.category.edit.store') {
            InterviewCategory::where('id',$request->id)->update([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.interview.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Interview_status_update(Request $request){
        $re = InterviewCategory::where('id',$request->id)->first();
        if(!$re){
            return response()->json(['No data'],404);
        }
        // dd($request->id);
        InterviewCategory::where('id',$request->id)->update([
                'status' => $request->status,
        ]);

        return response()->json(['status'=>'success','data'=>$request->status],200);
    }

    ///Job

    
    public function Job_index()
    {
        $categories = JobCategory::all();

        if (Route::currentRouteName() === "admin.interview.category.edit.index") {
            $categoryId = $_GET['id'];
            $category =  JobCategory::where('id', $categoryId)
                ->first();
        } else {
            $category = "";
        }
        // dd($categories);
        return view('Admin.Masters.job-category', compact('categories', 'category'));
    }
    public function Job_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'category'  => 'required',
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.job.category.create.store') {
            JobCategory::insert([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.job.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.job.category.edit.store') {
            JobCategory::where('id',$request->id)->update([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.job.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Job_status_update(Request $request){
        $re = JobCategory::where('id',$request->id)->first();
        if(!$re){
            return response()->json(['No data'],404);
        }
        // dd($request->id);
        JobCategory::where('id',$request->id)->update([
                'status' => $request->status,
        ]);

        return response()->json(['status'=>'success','data'=>$request->status],200);
    }

    //// News

    public function News_index()
    {
        $categories = NewsCategory::all();

        if (Route::currentRouteName() === "admin.news.category.edit.index") {
            $categoryId = $_GET['id'];
            $category =  NewsCategory::where('id', $categoryId)
                ->first();
        } else {
            $category = "";
        }
        // dd($categories);
        return view('Admin.Masters.news-category', compact('categories', 'category'));
    }
    public function News_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'category'  => 'required',
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.news.category.create.store') {
            NewsCategory::insert([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.news.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.news.category.edit.store') {
            NewsCategory::where('id',$request->id)->update([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.news.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function News_status_update(Request $request){
        $re = NewsCategory::where('id',$request->id)->first();
        if(!$re){
            return response()->json(['No data'],404);
        }
        // dd($request->id);
        NewsCategory::where('id',$request->id)->update([
                'status' => $request->status,
        ]);

        return response()->json(['status'=>'success','data'=>$request->status],200);
    }


    //// Notes

    public function Notes_index()
    {
        $categories = NotesCategory::all();

        if (Route::currentRouteName() === "admin.notes.category.edit.index") {
            $categoryId = $_GET['id'];
            $category =  NotesCategory::where('id', $categoryId)
                ->first();
        } else {
            $category = "";
        }
        // dd($categories);
        return view('Admin.Masters.notes-category', compact('categories', 'category'));
    }
    public function Notes_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'category'  => 'required',
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.notes.category.create.store') {
            NotesCategory::insert([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.notes.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.notes.category.edit.store') {
            NotesCategory::where('id',$request->id)->update([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.notes.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Notes_status_update(Request $request){
        $re = NotesCategory::where('id',$request->id)->first();
        if(!$re){
            return response()->json(['No data'],404);
        }
        // dd($request->id);
        NotesCategory::where('id',$request->id)->update([
                'status' => $request->status,
        ]);

        return response()->json(['status'=>'success','data'=>$request->status],200);
    }


    //// Document

    public function Document_index()
    {
        $categories = DocumentCategory::all();

        if (Route::currentRouteName() === "admin.document.category.edit.index") {
            $categoryId = $_GET['id'];
            $category =  DocumentCategory::where('id', $categoryId)
                ->first();
        } else {
            $category = "";
        }
        // dd($categories);
        return view('Admin.Masters.document-category', compact('categories', 'category'));
    }
    public function Document_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'category'  => 'required',
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.document.category.create.store') {
            DocumentCategory::insert([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.document.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.document.category.edit.store') {
            DocumentCategory::where('id',$request->id)->update([
                // 'category_code' => $request->category,
                'category_name' => $request->category_name,
                'status' => $status,
            ]);
            return redirect()->route('admin.document.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Document_status_update(Request $request){
        $re = DocumentCategory::where('id',$request->id)->first();
        if(!$re){
            return response()->json(['No data'],404);
        }
        // dd($request->id);
        DocumentCategory::where('id',$request->id)->update([
                'status' => $request->status,
        ]);

        return response()->json(['status'=>'success','data'=>$request->status],200);
    }



}
