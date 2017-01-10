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



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('home', function () {
    return view('welcome');
});
   

   Route::resource('users', 'UsersController');
   Route::get('users/{id}/destroy','UsersController@destroy')->name('users.destroy');
   
   Route::resource('categories','CategoriesController');
   Route::get('categories/{id}/destroy','CategoriesController@destroy')->name('categories.destroy');

   Route::resource('tags', 'TagsController');
   Route::get('tags/{id}/destroy','TagsController@destroy')->name('tags.destroy');

   Route::resource('articles', 'ArticlesController');
   Route::get('articles/{id}/destroy', 'ArticlesController@destroy')->name('articles.destroy');

   Route::get('images', 'ImagesController@index')->name('images.index');

});


Auth::routes();


Route::get('admin/auth/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('admin/auth/login', 'Auth\LoginController@login')->name('auth.login');


Route::get('/', 'HomeController@index')->name('front.index');
//Buscar articulos Por categoria

Route::get('categories/{name}', 'HomeController@searchCategory')->name('search.category');
Route::get('tags/{name}', 'HomeController@searchTag')->name('search.tag');


//Vista de Articulos 

Route::get('articles/{slug}', 'HomeController@viewArticle')->name('view.article');

