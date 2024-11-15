<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'signin'])->name('sign-in');
Route::get('sign-up', [AuthController::class, 'signup'])->name('sign-up');
Route::get('password-reset', [AuthController::class, 'passReset'])->name('password-reset');


Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
