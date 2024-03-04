<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group([], function () {
//     Route::resource('dashboard', DashboardController::class)->names('dashboard');
// });
Route::middleware('role:admin')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
});
Route::middleware('role:client')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'client'])->name('dashboard');
});
Route::middleware('role:client')->group(function () {
    Route::get('dashboard/stats', [DashboardController::class, 'clientstats'])->name('clientstats');
});