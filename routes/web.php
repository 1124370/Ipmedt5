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
Route::get('/decibel', '\App\Http\Controllers\DecibelController@show');
Route::get('/nietstoren', 'App\Http\Controllers\LedController@aanuit');

Route::get('/', function () {
    return view('index');
});