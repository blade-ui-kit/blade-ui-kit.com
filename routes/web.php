<?php

use App\Http\Controllers\DocsController;
use App\Http\Controllers\ShowIconController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::view('/blade-icons', 'blade-icons.index')->name('blade-icons');
Route::get('/blade-icons/{icon}', ShowIconController::class)->name('blade-icon');
Route::get('/docs/{version?}/{page?}', DocsController::class)->name('docs');
