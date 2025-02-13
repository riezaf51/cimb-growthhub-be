<?php

use App\Http\Controllers\TrainingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TraineeController;

Route::get('/', function () {
    return ApiFormatter::createApi(true, 'This service is working properly', null);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [TraineeController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout']);
    Route::get('/user-by-token', [AuthController::class, 'me']);

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::get('/roles', [RoleController::class, 'index']);
});

Route::apiResource('/trainings', TrainingController::class);

Route::fallback(function () {
    return ApiFormatter::createApi(false, 'Page not found', null, 404);
});
