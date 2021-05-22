<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DeveloperController;
use Illuminate\Support\Facades\Route;

Route::post('/developers', [DeveloperController::class, 'store'])->name('developer.store');
Route::get('/developers', [DeveloperController::class, 'index'])->name('developer.index');
