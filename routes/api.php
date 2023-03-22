<?php

use App\Http\Controllers\Api\V1\ActorController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\MovieController;
use App\Http\Controllers\Api\V1\FavoriteController;
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

});
Route::prefix('v1')->group(function () {
    Route::apiResource('/actors', ActorController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/movies', MovieController::class);
    Route::apiResource('/favorites', FavoriteController::class);

});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
