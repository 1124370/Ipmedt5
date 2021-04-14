<?php

use Illuminate\Support\Facades\Route;
use App\database\seeders;
use App\Http\Controllers\LedController;

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

//Daniek
use App\Http\Controllers\vakkenController;

Route::post('/vakken', [vakkenController::class, 'store']);
Route::get('/vakken', [vakkenController::class, 'index']);
Route::post('/aanhetwerk', [aanhetwerkController::class, 'newvak']);

// DanielDuijf
Route::get('/telefoon', 'App\Http\Controllers\AanwezigController@show');
Route::get('/stop', 'App\Http\Controllers\NoodgevalController@aanuit');

// DanielDrof
Route::get('/templucht', '\App\Http\Controllers\TempluchtController@show');
Route::post('/templucht', '\App\Http\Controllers\TempluchtController@store');

// Joey
Route::get('/decibel', '\App\Http\Controllers\DecibelController@show');
Route::get('/nietstoren', 'App\Http\Controllers\LedController@aanuit');

Route::get('/timer', function () {
    return view('welcome');
});




