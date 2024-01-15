<?php

use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\FakeController;
use App\Http\Controllers\API\NoteController;
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

Route::prefix('user')
    ->group(function () {
        Route::post('login', [UserController::class, 'login']);
        Route::post('register', [UserController::class, 'register']);
        Route::middleware('auth:sanctum')->group(function() {
            Route::get('/check', [UserController::class, 'check']);
            Route::post('logout', [UserController::class, 'logout']);
            Route::post('logout-from-all', [UserController::class, 'logoutFromAll']);
        });
    });
Route::prefix('fake')
    ->group(function () {
        Route::post('generate-notes', [FakeController::class, 'generateNotes']);
    });
Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('notes', NoteController::class)->except('create', 'edit');
});
