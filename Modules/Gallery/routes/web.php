<?php

use Illuminate\Support\Facades\Route;
use Modules\Gallery\App\Http\Controllers\GalleryController;

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

Route::middleware('role:client')->group(function () {
    Route::get('galleries', [GalleryController::class, 'galleries'])->name('galleries');
});