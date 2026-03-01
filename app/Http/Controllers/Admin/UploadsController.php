<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\{JobCategory, DocumentCategory, NotesCategory, NewsCategory};
use App\Models\{JobUpload, DocumentUpload, NewsUpload, NotesUpload};
use Illuminate\Support\Facades\Validator;



class UploadsController extends Controller
{
    //

    public function job_create(Request $request)
    {

        $categories  = JobCategory::all();

        $articles = JobUpload::orderBy('created_at', 'desc')->get();




        if (Route::currentRouteName() === "admin.job.upload.edit.index") {
            $articleId = $_GET['id'];
            $article =  JobUpload::where('id', $articleId)->first();
            if (!$article) {
                return redirect()->route('admin.job.upload.create.index');
            }
        } else {
            $article = "";
        }
        // dd($categories);
        return view('Admin.Uploads.job-upload', compact('categories', 'article', 'articles'));
    }
    public function job_store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'article_category_id'  => 'required',
            'article_title'  => 'required',
            'article_content'  => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->article_status ? 1 : 0);

        // dd($request->all(), $status ,$request->id);
        if (Route::currentRouteName() === 'admin.job.upload.create.store') {
            JobUpload::insert([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.job.upload.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.job.upload.edit.store') {
            JobUpload::where('id', $request->id)->update([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.job.upload.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function job_status_update(Request $request)
    {
        $re = JobUpload::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        JobUpload::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
    }

    ///news

    public function news_create(Request $request)
    {

        $categories  = NewsCategory::all();

        $articles = NewsUpload::orderBy('created_at', 'desc')->get();


        if (Route::currentRouteName() === "admin.news.upload.edit.index") {
            $articleId = $_GET['id'];
            $article =  NewsUpload::where('id', $articleId)->first();
            if (!$article) {
                return redirect()->route('admin.news.upload.create.index');
            }
        } else {
            $article = "";
        }
        // dd($categories);
        return view('Admin.Uploads.news-upload', compact('categories', 'article', 'articles'));
    }
    public function news_store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'article_category_id'  => 'required',
            'article_title'  => 'required',
            'article_content'  => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->article_status ? 1 : 0);

        // dd($request->all(), $status ,$request->id);
        if (Route::currentRouteName() === 'admin.news.upload.create.store') {
            NewsUpload::insert([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.news.upload.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.news.upload.edit.store') {
            NewsUpload::where('id', $request->id)->update([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.news.upload.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function news_status_update(Request $request)
    {
        $re = NewsUpload::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        NewsUpload::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
    }


    ////notes

    public function notes_create(Request $request)
    {

        $categories  = NotesCategory::all();

        $articles = NotesUpload::orderBy('created_at', 'desc')->get();



        if (Route::currentRouteName() === "admin.notes.upload.edit.index") {
            $articleId = $_GET['id'];
            $article =  NotesUpload::where('id', $articleId)->first();
            if (!$article) {
                return redirect()->route('admin.notes.upload.create.index');
            }
        } else {
            $article = "";
        }
        // dd($categories);
        return view('Admin.Uploads.notes-upload', compact('categories', 'article', 'articles'));
    }
    public function notes_store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'article_category_id'  => 'required',
            'article_title'  => 'required',
            'article_content'  => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->article_status ? 1 : 0);

        // dd($request->all(), $status ,$request->id);
        if (Route::currentRouteName() === 'admin.notes.upload.create.store') {
            NotesUpload::insert([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.notes.upload.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.notes.upload.edit.store') {
            NotesUpload::where('id', $request->id)->update([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.notes.upload.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function notes_status_update(Request $request)
    {
        $re = NotesUpload::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        NotesUpload::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
    }


    ////document

    public function document_create(Request $request)
    {

        $categories  = DocumentCategory::all();

        $articles = DocumentUpload::orderBy('created_at', 'desc')->get();




        if (Route::currentRouteName() === "admin.document.upload.edit.index") {
            $articleId = $_GET['id'];
            $article =  DocumentUpload::where('id', $articleId)->first();
            if (!$article) {
                return redirect()->route('admin.document.upload.create.index');
            }
        } else {
            $article = "";
        }
        // dd($categories);
        return view('Admin.Uploads.document-upload', compact('categories', 'article', 'articles'));
    }
    public function document_store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'article_category_id'  => 'required',
            'article_title'  => 'required',
            'article_content'  => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = ($request->article_status ? 1 : 0);

        // dd($request->all(), $status ,$request->id);
        if (Route::currentRouteName() === 'admin.document.upload.create.store') {
            DocumentUpload::insert([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.document.upload.create.index')->with('success', 'Record successfully created');
        }
        if (Route::currentRouteName() === 'admin.document.upload.edit.store') {
            DocumentUpload::where('id', $request->id)->update([
                'category_id' => $request->article_category_id,
                'title' => $request->article_title,
                'content' => $request->article_content,
                'status' => $status
            ]);
            return redirect()->route('admin.document.upload.create.index')->with('success', 'Record successfully updated');
        }
    }
    public function document_status_update(Request $request)
    {
        $re = DocumentUpload::where('id', $request->id)->first();
        if (!$re) {
            return response()->json(['No data'], 404);
        }
        // dd($request->id);
        DocumentUpload::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'success', 'data' => $request->status], 200);
    }
}
