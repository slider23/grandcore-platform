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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/mvp', function () {
    return view('mvp');
});

Route::get('/edem', function () {
    return view('edem');
});

// auth
Route::post('/auth/login', ['uses' => 'Auth\LoginController@checkLogin']);

// admin routes
Route::get('/users-list', function () {
    return view('admin.users');
})->middleware('admin');;

Route::get('/invites', ['uses' => 'InviteController@index'])->middleware('admin');;

Auth::routes();
