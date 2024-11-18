<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'signin'])->name('sign-in');
Route::post('sign-in-check', [AuthController::class, 'signInCheck'])->name('sign-in-check');
Route::get('sign-up', [AuthController::class, 'signup'])->name('sign-up');
Route::get('password-reset', [AuthController::class, 'passReset'])->name('password-reset');



