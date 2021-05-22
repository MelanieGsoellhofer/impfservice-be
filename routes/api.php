<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* auth */
Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login']);

/*  GET  */
Route::get('/', [\App\Http\Controllers\VaccinationController::class, 'index']);
Route::get('impfungen', [\App\Http\Controllers\VaccinationController::class,'index']);
Route::get('impfungen/{id}', [\App\Http\Controllers\VaccinationController::class,'findByID']);
Route::put('register/{id}/{svnr}' , [\App\Http\Controllers\UserController::class,'register']);

// Methoden die eine Authentication benötigen (save, update, delete, logout)
Route::group(['middleware' => ['api', 'auth.jwt']], function() {
    Route::post('impfungen', [\App\Http\Controllers\VaccinationController::class,'save']);
    Route::delete('impfungen/{id}' , [\App\Http\Controllers\VaccinationController::class,'delete']);
    Route::put('impfungen/{id}' , [\App\Http\Controllers\VaccinationController::class,'update']);
    Route::post('auth/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});
