<?php
// AdminPanel
Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'admin']], function () {

	// Dashboard
	Route::get('/', function() {
    	return view('admin.dashboard')->withTitle('Dashboard');
	});

	// Users Page
	Route::get('/users', 'UsersController@index');
	Route::get('/users/{id}/edit', 'UsersController@edit');
	Route::post('/users/{id}/edit', 'UsersController@update');
	Route::get('/users/add', function(){
		return view('admin.users.add')->withTitle('Add User');
	});
	Route::post('/users/add', 'UsersController@store');
	Route::get('/users/{id}/delete', 'UsersController@destroy');
	Route::get('/users/{id}/active', 'UsersController@active');
	Route::get('/users/{id}/ads', 'UsersController@ads');


	// categories Page
	Route::get('/categories', 'CategoriesController@index');
	Route::get('/categories/add', function(){
		return view('admin.categories.add')->withTitle('Add Category');
	});
	Route::post('/categories/add', 'CategoriesController@store');
	Route::get('/categories/{id}/edit', ['as' => 'admin/categories/update', 'uses' => 'CategoriesController@edit']);
	Route::patch('/categories/{id}/edit', 'CategoriesController@update');
	Route::get('/categories/{id}/delete', 'CategoriesController@destroy');
	Route::get('/category/{id}/ads', 'CategoriesController@ads');


	// Items Page
	Route::get('/items', 'ItemsController@index');
	Route::get('/items/add', 'ItemsController@addPage');
	Route::post('/items/add', 'ItemsController@store');
	Route::get('/items/{id}/edit', 'ItemsController@edit');
	Route::post('/items/{id}/edit', 'ItemsController@update');
	Route::get('/items/{id}/delete', 'ItemsController@destroy');
	Route::get('/items/{id}/active', 'ItemsController@active');

	// Comments Page
	Route::get('/comments', 'CommentsController@index');
	Route::get('/comments/{id}/edit', 'CommentsController@edit');
	Route::post('/comments/{id}/edit', 'CommentsController@update');
	Route::get('/comments/{id}/delete', 'CommentsController@destroy');
});

Route::auth();

// WebSite
Route::get('/', 'SiteController@index');


Route::get('/home', 'HomeController@index');
Route::get('/auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('/callback', 'Auth\AuthController@handleProviderCallback');

// Add Advertising
Route::get('/adding', 'SiteController@adding');
Route::post('/adding', 'ItemsController@adding');

// See Advertising 
Route::get('/item/{id}', 'SiteController@item');
Route::post('/item/{id}', 'SiteController@addComment');

// Settings 
Route::get('/user/{id}/edit', 'SiteController@user');
Route::post('/user/{id}/edit', 'SiteController@updateUser');
