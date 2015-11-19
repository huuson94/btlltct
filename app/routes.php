<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('user','FEUsersController');
Route::get('/', 'FEProductsController@index');
Route::get('signup', 'FEUsersController@create');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');
Route::resource('category','FECategoriesController');
Route::resource('product', 'FEProductsController');
Route::resource('exchange', 'FEExchangesController');

Route::filter('checkAdmin', function()
{   if(!FEUsersHelper::isAdmin()){
        $messages = array();
        $status = false;
        $messages[] = "Bạn không có quyền vào trang này";
        Session::flash('status',$status);
        Session::flash('messages', $messages);
        return Redirect::to('/');
    }
});
Route::group(array('prefix' => 'admin', 'before' => 'checkAdmin'), function(){
    Route::get('/','BEUsersController@index');
	Route::resource('category', 'BECategoriesController');
	Route::resource('user', 'BEUsersController');
	Route::resource('location', 'BELocationsController');
	Route::resource('product', 'BEProductsController');
});

//Route::resource('product', 'FEProductsController');
//
//Route::get('login', 'UsersController@getLogin');
//Route::get('signup', 'UsersController@getSignup');
//Route::controller('home','HomeController');
//
//Route::controller('category', 'CategoriesController');
//Route::controller('image', 'ImagesController');
//Route::controller('product', 'ProductsController');
//Route::get('/','HomeController@getIndex');
//Route::resource('admin', 'UsersController');
//Route::resource('admin-category', 'CategoriesController');
//Route::get('details','UsersController@getViewDetails');
//
