<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/eletro', [\App\Http\Controllers\Api\EletroApiController::class, 'index'])->name('eletro');
Route::post('/eletro/create', [\App\Http\Controllers\Api\EletroApiController::class, 'store'])->name('eletro.create');
Route::get('/eletro/show', [\App\Http\Controllers\Api\EletroApiController::class, 'show']);
Route::put('/eletro/update/{id}', [\App\Http\Controllers\Api\EletroApiController::class, 'update']);
Route::post('/eletro/delete', [\App\Http\Controllers\Api\EletroApiController::class, 'destroy'])->name('eletro.delete');

Route::get('/eletro/marca', [\App\Http\Controllers\Api\EletroMarcaApiController::class, 'index']);
