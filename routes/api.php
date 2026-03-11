<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/articleOne/{article}', [ArticleController::class, 'articleOne']);
Route::get('/article', [ArticleController::class, 'article']);
Route::get('/articleUser/{user}', [ArticleController::class, 'articleUser']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::resource('articles', ArticleController::class);
    Route::get('/user', [UserController::class, 'user']);
});
