<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ReferenceController;
use App\Http\Controllers\Api\UserGuideController;
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
        Route::get('/materials', [MaterialController::class, 'index']);
        Route::get('/materials/{id}', [MaterialController::class, 'show']);

        // Pre-test routes
        Route::get('/pre-test/questions', [TestController::class, 'getPreTestQuestions']);
        Route::get('/pre-test/questions/{index}', [TestController::class, 'getPreTestQuestion']);
        Route::post('/pre-test/submit', [TestController::class, 'submitPreTest']);

        // Post-test routes
        Route::get('/post-test/questions', [TestController::class, 'getPostTestQuestions']);
        Route::get('/post-test/questions/{index}', [TestController::class, 'getPostTestQuestion']);
        Route::post('/post-test/submit', [TestController::class, 'submitPostTest']);

        Route::get('/references', [ReferenceController::class, 'index']);
        Route::get('/user-guides', [UserGuideController::class, 'index']);

        Route::get('/videos', [VideoController::class, 'index']);

        Route::get('/profile', [ProfileController::class, 'index']);
        Route::put('/profile', [ProfileController::class, 'update']);
    });
});
