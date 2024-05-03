<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'sanitize'], function () {
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
});
