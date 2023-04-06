<?php

use App\Http\Controllers\Api\V1\ActorController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\MovieController;
use App\Http\Controllers\Api\V1\FavoriteController;
use App\Http\Controllers\Api\V1\FollowController;
use App\Http\Controllers\AuthController;
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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('favorites', 'favorites');
    Route::get('follows', 'follows');

});
Route::prefix('v1')->group(function () {
    Route::apiResource('/actors', ActorController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/movies', MovieController::class);
    Route::controller(FavoriteController::class)->group(function () {
        Route::post('favorites', 'store');
        Route::delete('favorites', 'destroy');
    });
    Route::controller(FollowController::class)->group(function () {
        Route::post('follows', 'store');
        Route::delete('follows', 'destroy');
    });
});

