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

//Route::get('/', function () {
//    return view('upload');
//});

Route::get('/', '\App\Http\Controllers\TransactionController@index');
Route::post('/uploadFile', '\App\Http\Controllers\TransactionController@uploadFile');
Route::get('/result', '\App\Http\Controllers\ResultController@showData');
