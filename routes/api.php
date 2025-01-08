<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::group(['prefix' => 'v1'], function (){
    Route::post('url-generate', [\App\Http\Controllers\LinkController::class,'generate'])->name('api.url-generate');
})->middleware('web');

Route::any('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::any('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::any('get-custom-links', [\App\Http\Controllers\AuthController::class, 'getLinks']);
Route::any('store-custom-link', [\App\Http\Controllers\AuthController::class, 'storeCustomLink']);
