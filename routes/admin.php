<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;

use Illuminate\Support\Facades\Route;

Route::middleware('basic.auth')->group(function () {

    Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('login-submit', [AdminAuthController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::middleware('check.if.admin.or.editor')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::prefix('masters')->group(function () {
            Route::get('quiz-category', [CategoryController::class, 'index']);
        });

        Route::get('/users-list', [RoleController::class, 'index'])->name('role.index');
        Route::post('/role-change', [RoleController::class, 'role_changer'])->name('role.change');
    });
});
