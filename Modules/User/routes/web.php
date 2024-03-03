<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\UserController;

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
//     Route::resource('user', UserController::class)->names('user');
// });

Route::middleware('role:admin')->group(function () {
    Route::get('users', [UserController::class, 'users'])->name('users');
});
Route::middleware('role:admin,client')->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
});