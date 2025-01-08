<?php

use Illuminate\Support\Facades\Route;



Route::get('', function (){return redirect()->route('web.link');})->name('index');
Route::get('url-shorter', [\App\Http\Controllers\LinkController::class,'index'])->name('web.link');
Route::get('about-project', [\App\Http\Controllers\HomeController::class,'aboutProject'])->name('web.about-project');
Route::get('about-us', [\App\Http\Controllers\HomeController::class,'aboutUs'])->name('web.about-us');
Route::get('q/{code}', [\App\Http\Controllers\LinkController::class,'redirect'])->name('redirect');
Route::get('cuaily.js', [\App\Http\Controllers\HomeController::class,'cuailyJS'])->name('cuaily-js');
