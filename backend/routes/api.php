<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\CommentController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::patch('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'delete']);

Route::get('/houses', [HouseController::class, 'index']);
Route::post('/houses', [HouseController::class, 'store']);
Route::get('/houses/{house}', [HouseController::class, 'show']);
Route::patch('/houses/{house}', [HouseController::class, 'update']);
Route::delete('/houses/{house}', [HouseController::class, 'delete']);

Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);
Route::get('/comments/{comment}', [CommentController::class, 'show']);
Route::patch('/comments/{comment}', [CommentController::class, 'update']);
Route::delete('/comments/{comment}', [CommentController::class, 'delete']);
