<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::prefix('admin')
    ->middleware(['admin']) // Correct alias
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });

Route::get('orders', [DashboardController::class, 'appsorders'])->name('orders');
?>
