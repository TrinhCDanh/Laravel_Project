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
Route::group(['prefix'=>'admin'], function() {
	Route::group(['prefix'=>'cate'], function() {
		Route::get('list', ['as'=>'admin.cate.list', 'uses'=>'CateController@getList']);
		Route::get('add', ['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
		Route::post('add', ['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
		Route::get('delete/{id}', ['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
		Route::get('edit/{id}', ['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
		Route::post('edit/{id}', ['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
	});
	Route::group(['prefix'=>'product'], function() {
		Route::get('list', ['as'=>'admin.product.list', 'uses'=>'ProductController@getList']);
		Route::get('add', ['as'=>'admin.cate.getAdd', 'uses'=>'ProductController@getAdd']);
		Route::post('add', ['as'=>'admin.cate.postAdd', 'uses'=>'ProductController@postAdd']);
	});
});
