<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');

Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');


//Route::post('/contact', 'ContactController@submitForm');


Route::post('/send-email', [ContactController::class, 'sendEmail']);
