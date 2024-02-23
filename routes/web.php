<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/orders', 'OrderController@index1')->middleware('auth');
Route::get('/finished', 'OrderController@index2')->middleware('auth');
Route::get('/orders/{id}', 'OrderController@show')->middleware('auth');
Route::delete('/orders/{id}', 'OrderController@destroy')->middleware('auth');

Route::get('/menu', 'MenuController@index');
Route::post('/menu', 'MenuController@show');

Route::get('/check_out', 'MenuController@showcheck_out');
Route::post('/check_out', 'MenuController@create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
