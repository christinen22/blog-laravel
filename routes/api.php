<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

// Protected routes (require authentication)
Route::middleware('auth:api')->group(function () {
    Route::post('/posts', [PostController::class, 'store']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('/projects', [ProjectController::class, 'store']);
});

// Public routes (accessible without authentication)

Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/send-email', [ContactController::class, 'sendEmail']);
