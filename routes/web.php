<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MailController;
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

Route::group(['middleware' => 'sanitize'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Auth::routes();

    Route::get('listing/search', [ListingController::class, 'search'])->name('listing.search');

    Route::resource('property', PropertyController::class)->only([
        'create',
        'update',
        'destroy',
        'edit',
        'store'
    ])->middleware('auth');

    Route::resource('property', PropertyController::class)->only('show');

    Route::patch('property/{id}/hide', [PropertyController::class, 'hide'])->middleware('auth')->name('property.hide');
    Route::patch('property/{id}/activate', [PropertyController::class, 'activate'])->middleware('auth')->name('property.activate');

    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', [UserController::class, 'index'])->name('my-profile');
        Route::put('/update', [UserController::class, 'update'])->name('user.update');
    });

    Route::get('/listing', [ListingController::class, 'index'])->name('listing');

    Route::get('/my-properties', function () {
        return view('my-properties');
    })->name('my-properties')->middleware('auth');

    Route::group(['prefix' => 'images', 'middleware' => 'auth'], function () {
        Route::delete('/delete/{id}', [ImageController::class, 'delete'])->name('images.delete');
    });

    Route::group(['prefix' => 'bookmark', 'middleware' => 'auth'], function () {
        Route::get('/', [BookmarkController::class, 'index'])->name('bookmark.index');
        Route::post('/create', [BookmarkController::class, 'create'])->name('bookmark.create');
        Route::delete('{id}/delete/', [BookmarkController::class, 'delete'])->name('bookmark.delete');
    });

    Route::post('/file-upload', [ImageController::class, 'upload'])->name('file-upload')->middleware('auth');

    Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration');
    Route::post('/signUp', [RegistrationController::class, 'signUp'])->name('sign-up');

    Route::post('/mail/{id}', [MailController::class, 'send'])->name('mail.send');
});
