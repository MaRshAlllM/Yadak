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
Route::get('/single/{id}', 'MainContentController@single');

Route::get('/category/{slug}','MainContentCategoriesController@index')->where('slug','/(.*)/(.*)/');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/root','AdminController@index');
Route::resource('/root/products','ProductController');

Route::resource('/root/categories','CategoryController');

Route::resource('/root/feature','FeatureController');

Route::resource('/root/roles','UserRolesController');

Route::get('/root/userlist','UserController@index');

Route::get('/root/userlist/{id}','UserController@show');

Route::patch('/root/userlist/{id}','UserController@update')->name('userlist.update');

Route::get('/root/image_gallery/{id}','ImageController@index');

Route::post('/root/image_gallery_upload','ImageController@gallery_upload');

Route::get('/root/delete_image/{id}','ImageController@delete_image');

Route::post('/root/addcart/{id}','CartController@add');

Route::get('/root/pay','CartController@pay');

Route::get('/root/remove_shop_row/{id}','CartController@remove_row');

Route::get('/root/shoppingcart','CartController@index')->name('shoppingcart');

