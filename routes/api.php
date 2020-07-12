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

Route::group(['middleware' => 'auth:api'], function () {
    // admin routes
    Route::group([
        'middleware' => ['admin'],
    ], function ($router) {
        Route::get('/invites', 'InviteController@index')->name('invites.index');
        Route::post('/invites', 'InviteController@store')->name('invites.store');
        Route::get('/invites/code', 'InviteController@generateInviteCode')->name('invites.code.generate');

        Route::get('/users-list', function () {
            return view('admin.users');
        });
    });
});

// auth
Route::post('/oauth/register', ['uses' => 'Auth\RegisterController@store']);


