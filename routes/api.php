<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DeveloperController;
use Illuminate\Support\Facades\Route;

Route::get('/developers', [DeveloperController::class, 'index'])->name('developer.index');
Route::get('/developers/{id}', [DeveloperController::class, 'show'])->name('developer.show');
Route::post('/developers', [DeveloperController::class, 'store'])->name('developer.store');
Route::put('/developers/{id}', [DeveloperController::class, 'update'])->name('developer.update');
Route::delete('/developers/{id}', [DeveloperController::class, 'destroy'])->name('developer.destroy');
