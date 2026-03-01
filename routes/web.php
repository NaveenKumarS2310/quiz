<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QustionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);


Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login_submit', [AuthController::class, 'login_submit'])->name('login_submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_submit', [AuthController::class, 'register_submit'])->name('register_submit');
Route::post('/sign-out', [AuthController::class, 'sign_out'])->name('sign_out');




Route::get('/quiz', [QuizController::class, 'quiz']);
Route::get('/quiz_category/{type}/{id}', [QuizController::class, 'quiz_category']);
Route::get('/quiz/{type}/{id}', [QuizController::class, 'quiz_overview']);
Route::get('/quiz_start/{type}/{id}/', [QuizController::class, 'quiz_start']);
Route::get('/quiz/{type}/{id}/{qust_no}', [QuizController::class, 'qustion_view']);
Route::post('/quiz/{type}/{id}/qustion_submit', [QuizController::class, 'single_qustion_submit']);
Route::get('/quiz_result', [QuizController::class, 'quiz_result']);
Route::get('/quiz_submit', [QuizController::class, 'quiz_submit']);

// Route::get('/upload-qustion', [QustionController::class, 'upload_qustion']);
// Route::post('/exam-pre-upload', [QustionController::class, 'exam_pre_upload']);

// Route::get('/create-exam', [QustionController::class, 'create_exam']);
// Route::post('/add-exam', [QustionController::class, 'add_exam']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::get('/question-list', [QustionController::class, 'question_list']);
// Route::get('/edit-question/{quiz_id}', [QustionController::class, 'edit_question']);
// Route::post('/question-edit-submit', [QustionController::class, 'question_edit_submit']);
// Route::get('/delete-question/{quiz_id}', [QustionController::class, 'delete_question']);

Route::get('/profile', [QuizController::class, 'profile'])->name('profile.update');

Route::post('/collect-daily-token', [TokenController::class, 'collect'])->name('token.collect');
