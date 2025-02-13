<?php

use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TraineeController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return ApiFormatter::createApi(true, 'This service is working properly', null);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [TraineeController::class, 'register']);

Route::apiResource('/trainings', TrainingController::class)->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout']);
    Route::get('/user-by-token', [AuthController::class, 'me']);

    Route::get('/roles', [RoleController::class, 'index']);

    Route::post('/trainings/enroll', [TrainingController::class, 'enroll']);
    Route::post('/trainings/cancel-enrollment', [TrainingController::class, 'cancelEnrollment']);

    // CMS Only Routes
    Route::middleware(RoleMiddleware::class . ':admin|hr')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store'])->middleware(RoleMiddleware::class . ':admin');
        Route::get('/users/{id}', [UserController::class, 'show']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware(RoleMiddleware::class . ':admin');

        Route::apiResource('/trainings', TrainingController::class)->only(['store', 'update', 'destroy']);

        Route::get('/trainings/{id}/requests', [TrainingController::class, 'enrollmentRequests']);
        Route::get('/trainings/{trainingId}/requests/{id}', [TrainingController::class, 'enrollmentRequestDetail']);
        Route::put('/trainings/{trainingId}/requests/reject-pending', [TrainingController::class, 'enrollmentRequestsBulkReject']);
        Route::put('/trainings/{trainingId}/requests/{id}', [TrainingController::class, 'enrollmentRequestApproval']);
    });
});

Route::fallback(function () {
    return ApiFormatter::createApi(false, 'URL not found', null, 404);
});
