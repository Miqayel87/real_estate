<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
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


Route::get('/login-register', function () {
    return view('login-register');
})->name('login');

Route::get('/listing', function () {
    return view('listing');
})->name('listing');

Route::get('/my-profile', function () {
    return view('my-profile');
})->name('my-profile');

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/signUp', [RegistrationController::class, 'signUp'])->name('sign-up');
//Route::resource('property',PropertyController::class);

//Route::group(['prefix' => 'property', 'middleware' => 'auth'], function () {
//    Route::get('/create', [PropertyController::class, 'create'])->name('submit-property');
//    Route::post('/store', [PropertyController::class, 'store'])->name('property.store');
//    Route::get('/{id}', [PropertyController::class, 'index'])->name('single-property');
//});

Route::resource('property', PropertyController::class);

//Route::get('/property/{id}', [PropertyController::class, 'index'])->name('property.index');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('my-profile');
    Route::put('/update', [UserController::class, 'update'])->name('user.update');
});

Route::get('/listing', [ListingController::class, 'index'])->name('listing');
