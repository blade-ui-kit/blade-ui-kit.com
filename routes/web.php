<?php

use App\Http\Controllers\DocsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::view('/blade-icons', 'blade-icons')->name('blade-icons');
Route::get('/docs/{version?}/{page?}', DocsController::class)->name('docs');
