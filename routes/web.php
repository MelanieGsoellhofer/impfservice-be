<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ImpfungController::class, 'index']);

/* Route::get('/', function () {
    Route ::get('/', [\App\Http\Controllers\ImfpungController::class, 'index']);
    Route ::get('/impfungen', [\App\Http\Controllers\ImfpungController::class, 'index']);
    Route ::get('/impfungen/{impfung_id}', [\App\Http\Controllers\ImfpungController::class, 'show']);

   //return view('welcome');
    $impfung = DB::table ( 'impfung' )->get();
    return $impfung ;
    // return view ('welcome', compact('location'));
});

Route::get('/login', function () {
    return "Hier kannst du dich einloggen" ;
});

Route::get('/login/impfanmeldung', function () {
    return "Hier kannst du dich zur Impfung anmelden" ; */

