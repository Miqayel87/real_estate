<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'sanitize'], function () {
    Route::group(['prefix' => 'bookmark', 'middleware' => 'auth'], function () {
        Route::get('/', [BookmarkController::class, 'index'])->name('bookmark.index');
        Route::post('/create', [BookmarkController::class, 'create'])->name('bookmark.create');
        Route::delete('{id}/delete/', [BookmarkController::class, 'delete'])->name('bookmark.delete');
    });
});
