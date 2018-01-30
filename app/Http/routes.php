<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BlogController@getIndex');
Route::get('post/single/{id}','BlogController@single');
Route::get('category/{id}','BlogController@category');
Route::post('admin','BlogController@autenticar');
Route::resource('admin/dashboard','AdminController');
Route::resource('categoria','CategoriaController');
Route::get('blogsystem','AdminController@blogsystem');
Route::get('system/post/{id}','AdminController@systempost');
Route::get('catsys/{id}','AdminController@categoriasblogsystem');
route::get('salir','AdminController@salir');
/*
|--------------------------------------------------------------------------
|Ruta de LOGIN
|--------------------------------------------------------------------------
*/
//route::controller('peticion/blog/index','BlogController');

/*
| FIN LOGIN
*/





































