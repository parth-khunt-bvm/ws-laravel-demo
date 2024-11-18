<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
$adminPrefix = "";
// Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function() {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
// });

?>
