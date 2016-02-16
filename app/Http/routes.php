<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/dvds/search', 'DVDController@search');
	Route::get('/dvds', 'DVDController@results');

	Route::get('/dvds/create', 'DVDController@create');
	Route::post('/dvds/create/new', 'DVDController@createNew');

	Route::get('/dvds/{id}', 'DVDController@dvd');
	Route::post('/dvds/{id}/review', 'DVDController@review');

	Route::get('/genres/{genre_id}/dvds', 'DVDController@genreDVDs');
});

