<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login-register', function () {
    return view('login-register');
});

Route::get('/listing', function () {
    return view('listing');
});

Route::get('/single-property', function () {
    return view('single-property');
});

Route::get('/my-profile', function () {
    return view('my-profile');
});

Route::get('/submit-property', function () {
    return view('submit-property');
});


Auth::routes();

Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/signUp', [RegistrationController::class, 'signUp'])->name('sign-up');
//Route::resource('property',PropertyController::class);


Route::group(['prefix' => 'property', 'middleware' => 'auth'], function () {
    Route::get('/create', [PropertyController::class, 'store'])->name('property.store');
});
