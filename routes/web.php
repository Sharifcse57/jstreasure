<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

// ================Frontend part start hare=======================
Route::get('/', 'SitesController@index')->name('home');
Route::get('/category/{id}', 'SitesController@category');
Route::get('/product_details/{id}', 'SitesController@product_details');
Route::get('/cart', 'SitesController@cart')->name('cart');
Route::get('/minicart', 'SitesController@mini_cart');
Route::get('/terms', 'SitesController@terms')->name('terms');
Route::post('/add_cart_processing', 'SitesController@add_cart_processing');
Route::post('/update_cart_processing', 'SitesController@update_cart_processing');
Route::post('/get_product_to_modal', 'SitesController@get_product_to_modal');
// ================Frontend part End hare=======================

//==================For Ajax call=========================
Route::post('/get-sub-categories', 'AjaxController@getSubCategories')->name('ajax.getSubCat');
//==================End Ajax call==========================

//================ Backend part start hare ==================
Route::get('/myadmin', 'HomeController@index')->name('dashboard');

// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/myadmin', 'HomeController@index')->name('dashboard');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permissions']], function () {

	Route::resource('roles', 'RolesController');
	Route::get('/users', 'Auth\RegisterController@showUserLists')->name('users.index');
	Route::get('/users/{user}', 'Auth\RegisterController@showUser')->name('users.show');
	Route::get('/users/{user}/edit', 'Auth\RegisterController@editUser')->name('users.edit');

	Route::put('/users/{user}/update', 'Auth\RegisterController@updateUser')->name('users.update');
	Route::delete('users/{user}', 'Auth\RegisterController@destroyUser')->name('users.destroy');
	Route::resource('site_settings', 'SiteSettingsController',
		['only' => ['edit', 'update']]);
	Route::resource('product', 'ProductsController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('pages', 'PagesController');
	Route::resource('menus', 'MenusController');
});
// ==========================Backend part end hare======================

// ==========================Authentication routes======================
Auth::routes();
Route::get('/users/edit-password', 'Auth\RegisterController@editPassword')->name('users.editPassword');
Route::put('/users/update-password', 'Auth\RegisterController@updatePassword')->name('users.updatePassword');
// ==========================Authentication routes======================
