<?php

use Illuminate\Support\Facades\Route;
use Modules\Authentication\App\Http\Controllers\AuthenticationController;

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
//     Route::resource('authentication', AuthenticationController::class)->names('authentication');
// });

Route::middleware('guest:admin,client')->group(function () {
    Route::get('login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('signin', [AuthenticationController::class, 'signin'])->name('signin');
    Route::get('register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('signup', [AuthenticationController::class, 'signup'])->name('signup');
});


Route::get('test', [AuthenticationController::class, 'test'])->middleware('role:client')->name('test');
Route::get('testadmin', [AuthenticationController::class, 'testadmin'])->middleware('role:admin')->name('testadmin');

Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');