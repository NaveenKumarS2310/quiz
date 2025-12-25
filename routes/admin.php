<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;




Route::get('login', [AdminAuthController::class, 'login'])->name('login');
Route::post('login-submit', [AdminAuthController::class, 'loginSubmit'])->name('login.submit');


Route::middleware('basic.auth')->group(function () {



 Route::middleware('check.if.admin.or.editor')->group(function () {

  Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


   Route::prefix('masters')->group(function () {
    Route::get('quiz-category', [CategoryController::class, 'index']);
   });
  
 });
});
