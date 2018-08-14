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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {


    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/{eventid}', 'DashboardController@show')->name('promotions');
    Route::post('/generate', 'DashboardController@store')->name('generate');
    Route::patch('/dashboard/status/{codeid}', 'DashboardController@updateStatus')->name('updatestatus');



    Route::get('/createcode', 'PromoCodesController@create')->name('createcodes');
    Route::get('/challenge', 'PromoCodesController@index')->name('challenge');
    Route::post('/challenge', 'PromoCodesController@process')->name('process');






    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

});