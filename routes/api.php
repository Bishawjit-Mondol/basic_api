<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/demo', [DemoController::class, 'index']);
Route::get('/users', [UserController::class, 'index']); // all user
Route::get('/users/{user}', [UserController::class, 'show']); // show specific user
Route::post('/users', [UserController::class, 'store']); // store data
Route::put('/users/{user}', [UserController::class, 'update']); // upate data
Route::delete('/users/{user}', [UserController::class, 'destroy']); // delete data
Route::post('/upload', [UserController::class, 'upload']); // store image
