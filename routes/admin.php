<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'sanitize'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('article', ArticleController::class);
        Route::resource('feature', FeatureController::class);
        Route::resource('type', TypeController::class);
        Route::resource('adminProperty', AdminPropertyController::class);
        Route::resource('adminUser', AdminUserController::class);
    });

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
