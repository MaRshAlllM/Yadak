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

Route::get('/', 'MainContentController@index');
Route::get('/single', 'MainContentController@single');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/root','AdminController@index');

Route::resource('/root/products','ProductController');

Route::resource('/root/categories','CategoryController');

Route::resource('/root/feature','FeatureController');

Route::resource('/root/roles','UserRolesController');

Route::get('/root/userlist','UserController@index');

Route::get('/root/image_gallery/{id}','ImageController@index');

Route::post('/root/image_gallery_upload','ImageController@gallery_upload');

Route::get('/root/delete_image/{id}','ImageController@delete_image');