<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\PreTestController;
use App\Http\Controllers\Admin\PostTestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes/web.php
Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::resource('materials', MaterialController::class);
        // Pre Tests
        Route::resource('pre-tests', PreTestController::class);

        // Post Tests
        Route::resource('post-tests', PostTestController::class);
    }
);
