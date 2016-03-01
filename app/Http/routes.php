<?php

use App\Services\API\Spotify;

Route::get('/', function () {
    return view('welcome');
});


Route::group([ 'prefix' => 'api/v1', 'namespace' => 'API' ], function() {
    Route::get('genres', 'GenreController@index');
    Route::get('genres/{id}', 'GenreController@show');
    Route::get('dvds', 'DVDController@index');
    Route::get('dvds/{id}', 'DVDController@show');
    Route::post('dvds', 'DVDController@store');
});


Route::group(['middleware' => ['web']], function () {
	Route::get('/dvds/search', 'DVDController@search');
	Route::get('/dvds', 'DVDController@results');

	Route::get('/dvds/create', 'DVDController@create');
	Route::post('/dvds/create/new', 'DVDController@createNew');

	Route::get('/dvds/{id}', 'DVDController@dvd');
	Route::post('/dvds/{id}/review', 'DVDController@review');

	Route::get('/genres/{genre_id}/dvds', 'DVDController@genreDVDs');

	Route::get('/spotify', 'SpotifyController@search');
	Route::get('/spotify/artists', 'SpotifyController@results');
    Route::get('/spotify/artists/{artist_id}', 'SpotifyController@artist');
});

