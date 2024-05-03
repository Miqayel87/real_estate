<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PropertyController;

use App\Http\Controllers\UserController;
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

    Route::get('listing/search', [ListingController::class, 'search'])->name('listing.search');
    Route::get('/listing', [ListingController::class, 'index'])->name('listing');

    Route::get('/my-properties', function () {
        return view('my-properties');
    })->name('my-properties')->middleware('auth');

    Route::group(['prefix' => 'images', 'middleware' => 'auth'], function () {
        Route::delete('/delete/{id}', [ImageController::class, 'delete'])->name('images.delete');
    });

    Route::post('/file-upload', [ImageController::class, 'upload'])->name('file-upload')->middleware('auth');

    Route::post('/mail/{id}', [MailController::class, 'send'])->name('mail.send');
});


