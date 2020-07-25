<?php

use App\Http\Controllers\DocsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/docs/{version?}/{page?}', DocsController::class)->name('docs');
