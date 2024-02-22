<?php

use App\Http\Controllers\AtelierController;
use App\Http\Controllers\ThemeController;
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

Route::get('ateliers', [AtelierController::class, 'index']);
Route::get('ateliers/{id}', [AtelierController::class, 'show']);
Route::post('ateliers', [AtelierController::class, 'store']);
Route::put('ateliers/{id}', [AtelierController::class, 'update']);
Route::delete('ateliers/{id}', [AtelierController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('themes', [ThemeController::class, 'index']);
Route::get('themes/{id}', [ThemeController::class, 'show']);
Route::post('themes', [ThemeController::class, 'store']);
Route::put('themes/{id}', [ThemeController::class, 'update']);
Route::delete('themes/{id}', [ThemeController::class, 'destroy']);

