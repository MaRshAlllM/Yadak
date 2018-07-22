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

Route::get('/root','AdminController@index');

Route::resource('/root/products','ProductController');

Route::get('/root/feature','FeatureController@index');

Route::post('/root/feature','FeatureController@insert_feature');

Route::get('/root/listfeatures','FeatureController@list_features');