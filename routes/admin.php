<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UploadsController;

use Illuminate\Support\Facades\Route;

 Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');

 Route::post('login-submit', [AdminAuthController::class, 'loginSubmit'])->name('admin.login.submit');
 Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('basic.auth')->group(function () {

 
 Route::middleware('check.if.admin.or.editor')->group(function () {
  Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::prefix('masters')->group(function () {
   /////////Quiz
   Route::get('quiz-category', [CategoryController::class, 'Quiz_index'])->name('admin.quiz.category.create.index');
   Route::get('edit/quiz-category', [CategoryController::class, 'Quiz_index'])->name('admin.quiz.category.edit.index');
   Route::post('/store/quiz-category', [CategoryController::class, 'Quiz_store'])->name('admin.quiz.category.create.store');
   Route::post('edit/store/quiz-category', [CategoryController::class, 'Quiz_store'])->name('admin.quiz.category.edit.store');
   Route::post('update/status/quiz-category', [CategoryController::class, 'Quiz_status_update'])->name('admin.quiz.category.status.update');
   //////////Interview
   Route::get('interview-category', [CategoryController::class, 'Interview_index'])->name('admin.interview.category.create.index');
   Route::get('edit/interview-category', [CategoryController::class, 'Interview_index'])->name('admin.interview.category.edit.index');
   Route::post('/store/interview-category', [CategoryController::class, 'Interview_store'])->name('admin.interview.category.create.store');
   Route::post('edit/store/interview-category', [CategoryController::class, 'Interview_store'])->name('admin.interview.category.edit.store');
   Route::post('update/status/interview-category', [CategoryController::class, 'Interview_status_update'])->name('admin.interview.category.status.update');
   ////////////////Job
   Route::get('job-category', [CategoryController::class, 'Job_index'])->name('admin.job.category.create.index');
   Route::get('edit/job-category', [CategoryController::class, 'Job_index'])->name('admin.job.category.edit.index');
   Route::post('/store/job-category', [CategoryController::class, 'Job_store'])->name('admin.job.category.create.store');
   Route::post('edit/store/job-category', [CategoryController::class, 'Job_store'])->name('admin.job.category.edit.store');
   Route::post('update/status/job-category', [CategoryController::class, 'Job_status_update'])->name('admin.job.category.status.update');
   //////////////News
   Route::get('news-category', [CategoryController::class, 'News_index'])->name('admin.news.category.create.index');
   Route::get('edit/news-category', [CategoryController::class, 'News_index'])->name('admin.news.category.edit.index');
   Route::post('/store/news-category', [CategoryController::class, 'News_store'])->name('admin.news.category.create.store');
   Route::post('edit/store/news-category', [CategoryController::class, 'News_store'])->name('admin.news.category.edit.store');
   Route::post('update/status/news-category', [CategoryController::class, 'News_status_update'])->name('admin.news.category.status.update');
   /////////////Notes
   Route::get('notes-category', [CategoryController::class, 'Notes_index'])->name('admin.notes.category.create.index');
   Route::get('edit/notes-category', [CategoryController::class, 'Notes_index'])->name('admin.notes.category.edit.index');
   Route::post('/store/notes-category', [CategoryController::class, 'Notes_store'])->name('admin.notes.category.create.store');
   Route::post('edit/store/notes-category', [CategoryController::class, 'Notes_store'])->name('admin.notes.category.edit.store');
   Route::post('update/status/notes-category', [CategoryController::class, 'Notes_status_update'])->name('admin.notes.category.status.update');
   ///////////////Document
   Route::get('document-category', [CategoryController::class, 'Document_index'])->name('admin.document.category.create.index');
   Route::get('edit/document-category', [CategoryController::class, 'Document_index'])->name('admin.document.category.edit.index');
   Route::post('/store/document-category', [CategoryController::class, 'Document_store'])->name('admin.document.category.create.store');
   Route::post('edit/store/document-category', [CategoryController::class, 'Document_store'])->name('admin.document.category.edit.store');
   Route::post('update/status/document-category', [CategoryController::class, 'Document_status_update'])->name('admin.document.category.status.update');
  });

  Route::prefix('uploads')->group(function(){

   ////////////////Job
   Route::get('job-upload-list', [CategoryController::class, 'job_list'])->name('admin.job.upload.list.index');

   Route::get('job-upload-create', [CategoryController::class, 'job_create'])->name('admin.job.upload.create.index');

   Route::get('job-upload-edit', [CategoryController::class, 'job_edit'])->name('admin.job.upload.edit.index');

   Route::post('/store/job-category', [CategoryController::class, 'Job_store'])->name('admin.job.category.create.store');
   
   Route::post('edit/store/job-category', [CategoryController::class, 'Job_store'])->name('admin.job.category.edit.store');

   Route::post('update/status/job-category', [CategoryController::class, 'Job_status_update'])->name('admin.job.category.status.update');

  });
  Route::get('/users-list', [RoleController::class, 'index'])->name('role.index');
  Route::post('/role-change', [RoleController::class, 'role_changer'])->name('role.change');
 });
});
