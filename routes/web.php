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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});


Route::get('/screenDistance',[ScreenDistanceController::class, 'show']);
Route::get('/screenHeight','App\Http\Controllers\ScreenHeightController@show');
Route::get('/deskDistance','App\Http\Controllers\DeskDistanceController@show');
