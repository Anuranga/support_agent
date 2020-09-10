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
    return view('create');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/list', 'App\Http\Controllers\SupportTicketController@index')->middleware('auth');

Route::resource('support', 'App\Http\Controllers\SupportTicketController');

Route::resource('agent', 'App\Http\Controllers\SupportTicketController');

Auth::routes();

