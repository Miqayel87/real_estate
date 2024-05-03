<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'sanitize'], function () {
    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', [UserController::class, 'index'])->name('my-profile');
        Route::put('/update', [UserController::class, 'update'])->name('user.update');
    });
});
