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

Route::get('/', 'MainContentController@index')->name('index');
Route::get('/single/{id}', 'MainContentController@single');
Route::post('/single/{id}/comment','MainContentController@insertComment')->name('insertcomment')->middleware('auth');
Route::get('/search', 'MainContentController@search');

Route::get('/category/{slug}','MainContentCategoriesController@index')->where('slug','(.*)');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['middleware' => ['auth','has_role']],function(){
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
	Route::get('/root/comments','CommentController@index');
    Route::patch('/root/comments/{id}/aord','CommentController@aord');
    Route::delete('/root/comments/{id}/delete','CommentController@delete');
    Route::get('/root/comments/{id}/edit','CommentController@show');
    Route::put('/root/comments/{id}/edit','CommentController@edit')->name('edit_comment');
    Route::get('/root/paylist','CartController@paylist');
    Route::get('/root/most_purchases','CartController@most_purchases');
    Route::get('/root/paymentdetail/{id}','CartController@payment_detail_admin');
    Route::get('/root/slideshow','ImageController@slideshow');
    Route::post('/root/slideshow_upload','ImageController@slideshow_upload');
    Route::get('/root/delete_slideshow/{id}','ImageController@delete_slideshow');
});

Route::group(['middleware'=>'auth'],function(){

    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('/profile_edit','ProfileController@edit')->name('profile_edit');
});


Route::post('/addcart/{id}','CartController@add');
Route::get('/pay','CartController@pay');
Route::get('/pdetail/{id}','CartController@pdetail');
Route::get('/mypurchase','CartController@mypurchase')->name('mypurchase');
Route::get('/verify','CartController@verify');
Route::get('/remove_shop_row/{id}','CartController@remove_row');
Route::get('/shoppingcart','CartController@index')->name('shoppingcart');


Route::get('/aboutus','PageController@aboutus');
Route::get('/contactus','PageController@contactus');
Route::get('/addcompare/{id?}','CompareController@add');
Route::get('/compare/','CompareController@index');
Route::get('/delcompare/','CompareController@delete');
Route::get('/transport','PageController@transport');
Route::get('/discount','PageController@discount');
Route::get('/support','PageController@support');

