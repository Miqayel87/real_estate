<?php

use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'sanitize'], function () {
    Auth::routes();

    Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration');
    Route::post('/signUp', [RegistrationController::class, 'signUp'])->name('sign-up');
});
