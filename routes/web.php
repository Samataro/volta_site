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

Route::get('/', 'App\Http\Controllers\Controller@index')->name("welcome");
Route::get('/page/{page}', 'App\Http\Controllers\Controller@index')->name("page");
Route::get('/activity', 'App\Http\Controllers\Controller@activity')->name("activity");
