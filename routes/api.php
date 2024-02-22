<?php

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

Route::get('ateliers', 'App\Http\Controllers\AtelierController@index');
Route::get('ateliers/{id}', 'App\Http\Controllers\AtelierController@show');
Route::post('ateliers', 'App\Http\Controllers\AtelierController@store');
Route::put('ateliers/{id}', 'App\Http\Controllers\AtelierController@update');
Route::delete('ateliers/{id}', 'App\Http\Controllers\AtelierController@destroy');

Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('users/{id}', 'App\Http\Controllers\UserController@destroy');

Route::get('themes', 'App\Http\Controllers\ThemeController@index');
Route::get('themes/{id}', 'App\Http\Controllers\ThemeController@show');
Route::post('themes', 'App\Http\Controllers\ThemeController@store');
Route::put('themes/{id}', 'App\Http\Controllers\ThemeController@update');
Route::delete('themes/{id}', 'App\Http\Controllers\ThemeController@destroy');

