<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });

    Route::post('forgot-password', [ForgotPasswordController::class, 'sendOTP']);
    Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOTP']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/materials', [App\Http\Controllers\API\MaterialController::class, 'index']);
        Route::get('/materials/{id}', [App\Http\Controllers\API\MaterialController::class, 'show']);
    });
});
