<?php

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
    return view('home');
});

Route::get('/login', function () {
    return redirect(url('/'));
});

Route::post('/authenticate', 'AuthenticateController@index');

Route::get('/authenticate/return', 'AuthenticateController@return');

Route::get('/authenticate/logout', 'AuthenticateController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});
