<?php

use App\Http\Controllers\ShowIconController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/blade-icons')->name('home');
Route::view('/blade-icons', 'blade-icons.index')->name('blade-icons');
Route::get('/blade-icons/{icon}', ShowIconController::class)->name('blade-icon');
Route::permanentRedirect('/docs', 'https://github.com/blade-ui-kit/docs')->name('docs');
