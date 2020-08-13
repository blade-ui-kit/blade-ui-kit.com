<?php

use App\Http\Controllers\BladeIconController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::view('/blade-icons', 'blade-icon.index')->name('blade-icons');
Route::get('/blade-icons/{icon}', BladeIconController::class)->name('blade-icon');
Route::get('/docs/{version?}/{page?}', DocsController::class)->name('docs');
