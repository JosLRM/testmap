<?php

use App\Http\Controllers\DahuaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/test')->name('test')->group(function(){
    Route::get('/', [TestController::class, 'index'])->name('index');
    Route::get('/test1', [TestController::class, 'show'])->name('show');
    Route::get('/test2', [TestController::class, 'test2'])->name('test2');
    Route::get('/mapa', [TestController::class, 'mapa'])->name('mapa');
});

Route::get('/dahua', [DahuaController::class, 'index'])->name('dahua.index');
