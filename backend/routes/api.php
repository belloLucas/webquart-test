<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/houses', [HouseController::class, 'index']);

Route::get('/houses/{house}', [HouseController::class, 'show']);

Route::get('/user/houses/{user}', [HouseController::class, 'showUserHouses']);

Route::post('/houses', [HouseController::class, 'store'])
    ->middleware('auth')
    ->name('houses.store');

Route::patch('/houses/{house}', [HouseController::class, 'update'])
    ->middleware('auth')
    ->name('houses.update');

Route::delete('/houses/{house}', [HouseController::class, 'delete']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'show']);

Route::post('/comments', [CommentController::class, 'store']);

Route::get('/comments/{house}', [CommentController::class, 'index']);
