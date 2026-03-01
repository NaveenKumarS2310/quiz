<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{QuizCategory, QuizCategoryMaster};
use App\Models\{InterviewCategory, NewsCategory};
use App\Models\{DocumentCategory, JobCategory};
use App\Models\{NotesCategory};


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // Quiz
    public function Quiz_index()
    {
        $master_categories = QuizCategoryMaster::all();
        $categories = QuizCategory::join('quiz_category_master', 'quiz_category_master.id', '=', 'quiz_categories.category_code')
            ->select('quiz_categories.*', 'quiz_category_master.*', 'quiz_categories.id as record_id')
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
        return view('Admin.Masters.quiz-category', compact('categories', 'master_categories', 'category'));
    }
    private function handleImageUpload(Request $request, $existingImage = null)
    {
        if ($request->hasFile('category_image')) {
            if ($existingImage && File::exists(public_path('images/categories/' . $existingImage))) {
                File::delete(public_path('images/categories/' . $existingImage));
            }
            $image = $request->file('category_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            return $imageName;
        }

        if ($request->remove_image == '1') {
            if ($existingImage && File::exists(public_path('images/categories/' . $existingImage))) {
                File::delete(public_path('images/categories/' . $existingImage));
            }
            return null;
        }

        return $existingImage;
    }

    public function Quiz_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'  => 'required',
            'category_name' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.quiz.category.create.store') {
            $imageName = $this->handleImageUpload($request);
            QuizCategory::insert([
                'category_code' => $request->category,
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.quiz.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.quiz.category.edit.store') {
            $category = QuizCategory::where('id', $request->id)->first();
            $imageName = $this->handleImageUpload($request, $category->category_image);
            QuizCategory::where('id', $request->id)->update([
                'category_code' => $request->category,
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.quiz.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Quiz_status_update(Request $request)
    {
        $re = QuizCategory::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        QuizCategory::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
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
            'category_name' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.interview.category.create.store') {
            $imageName = $this->handleImageUpload($request);
            InterviewCategory::insert([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.interview.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.interview.category.edit.store') {
            $category = InterviewCategory::where('id', $request->id)->first();
            $imageName = $this->handleImageUpload($request, $category->category_image);
            InterviewCategory::where('id', $request->id)->update([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.interview.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Interview_status_update(Request $request)
    {
        $re = InterviewCategory::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        InterviewCategory::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
    }

    ///Job


    public function Job_index()
    {
        $categories = JobCategory::all();

        if (Route::currentRouteName() === "admin.job.category.edit.index") {
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
            'category_name' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.job.category.create.store') {
            $imageName = $this->handleImageUpload($request);
            JobCategory::insert([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.job.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.job.category.edit.store') {
            $category = JobCategory::where('id', $request->id)->first();
            $imageName = $this->handleImageUpload($request, $category->category_image);
            JobCategory::where('id', $request->id)->update([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.job.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Job_status_update(Request $request)
    {
        $re = JobCategory::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        JobCategory::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
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
            'category_name' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.news.category.create.store') {
            $imageName = $this->handleImageUpload($request);
            NewsCategory::insert([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.news.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.news.category.edit.store') {
            $category = NewsCategory::where('id', $request->id)->first();
            $imageName = $this->handleImageUpload($request, $category->category_image);
            NewsCategory::where('id', $request->id)->update([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.news.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function News_status_update(Request $request)
    {
        $re = NewsCategory::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        NewsCategory::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
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
            'category_name' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.notes.category.create.store') {
            $imageName = $this->handleImageUpload($request);
            NotesCategory::insert([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.notes.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.notes.category.edit.store') {
            $category = NotesCategory::where('id', $request->id)->first();
            $imageName = $this->handleImageUpload($request, $category->category_image);
            NotesCategory::where('id', $request->id)->update([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.notes.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Notes_status_update(Request $request)
    {
        $re = NotesCategory::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        NotesCategory::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
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
            'category_name' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->category_status ? 1 : 0);
        if (Route::currentRouteName() === 'admin.document.category.create.store') {
            $imageName = $this->handleImageUpload($request);
            DocumentCategory::insert([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.document.category.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.document.category.edit.store') {
            $category = DocumentCategory::where('id', $request->id)->first();
            $imageName = $this->handleImageUpload($request, $category->category_image);
            DocumentCategory::where('id', $request->id)->update([
                'category_name' => $request->category_name,
                'category_image' => $imageName,
                'status' => $status,
            ]);
            return redirect()->route('admin.document.category.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function Document_status_update(Request $request)
    {
        $re = DocumentCategory::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        DocumentCategory::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
    }
}
