<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1', 'namespace' => '\API'], function () {

	Route::group(['as' => 'wheels.', 'prefix' => 'wheels'], function () {
		Route::get('/handbook', 'WheelController@getHanbook')->name('getHanbook');
	});
});

