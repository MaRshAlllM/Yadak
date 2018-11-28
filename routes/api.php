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


Route::post('login', 'API\UserController@login');
Route::get('index','API\UserController@index');
Route::get('single','API\UserController@single');
Route::get('category','API\UserController@categoty');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});


// Route::post('register', 'API\UserController@register');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
