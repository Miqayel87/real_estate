<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('listing/search', [ListingController::class, 'search'])->name('listing.search');
Route::resource('property', PropertyController::class);
Route::resource('property', PropertyController::class)->only([
    'create',
    'update',
    'destroy'
])->middleware('auth');
Route::patch('property/{id}/activate', [PropertyController::class, 'activate'])->middleware('auth')->name('property.activate');


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('my-profile');
    Route::put('/update', [UserController::class, 'update'])->name('user.update');
});

Route::get('/listing', [ListingController::class, 'index'])->name('listing');

Route::group(['prefix' => 'images', 'middleware' => 'auth'], function () {
    Route::delete('/delete/{id}', [ImageController::class, 'delete'])->name('images.delete');
});

Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration');
Route::post('/signUp', [RegistrationController::class, 'signUp'])->name('sign-up');

