<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkinCareController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SkinCareController::class, 'showWelcome'])->name('welcome');
Route::get('/form', [SkinCareController::class, 'showForm'])->name('login');
Route::post('/recommendations', [SkinCareController::class, 'processForm'])->name('process.form');

