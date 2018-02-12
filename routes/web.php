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
	$product = DB::table('products')->select('id', 'name', 'image', 'price', 'alias')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
    return view('user.pages.home', compact('product'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'web'], function() {
	Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function() {
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
			Route::get('add', ['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
			Route::post('add', ['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
			Route::get('delete/{id}', ['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
			Route::get('edit/{id}', ['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
			Route::post('edit/{id}', ['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);
			//Delete image detail
			Route::get('delimg/{id}', ['as'=>'admin.product.getDelImg', 'uses'=>'ProductController@getDelImg']);
		});
		Route::group(['prefix'=>'user'], function() {
			Route::get('list', ['as'=>'admin.user.list', 'uses'=>'UserController@getList']);
			Route::get('add', ['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
			Route::post('add', ['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);
			Route::get('delete/{id}', ['as'=>'admin.user.getDelete', 'uses'=>'UserController@getDelete']);
			Route::get('edit/{id}', ['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
			Route::post('edit/{id}', ['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);
		});
		
	});

});

/*Route::group(['prefix'=>'auth'], function() {
	Route::get('login', ['as' => 'auth.login.getLogin', 'uses' => 'Auth\LoginController@getLogin']);
	Route::post('login', ['as' => 'auth.login.postLogin', 'uses' => 'Auth\LoginController@postLogin']);
});*/

Route::get('loai-san-pham/{id}/{tenloai}', ['as'=>'loaisanpham', 'uses'=>'ShowController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tensanpham}', ['as'=>'chitietsanpham', 'uses'=>'ShowController@chitietsanpham']);


//Route::get('loai-san-pham/{id}/{tenloai}', ['as'=>'loaisanpham', 'uses'=>'HomeController@loaisanpham']);
