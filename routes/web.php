<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('front');
});

Route::get('/frontend', [\App\Http\Controllers\Front\FrontApiController::class, 'getAllEletro'])->name('front');
Route::post('/search', [\App\Http\Controllers\Front\FrontApiController::class, 'searchEletro'])->name('search');
