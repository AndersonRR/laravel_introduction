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

Route::get('/series', 'SeriesController@index')->name('home');
Route::get('/series/criar', 'SeriesController@create')->name('form_create_serie');
Route::post('/series/criar', 'SeriesController@store')->name('save_serie');
Route::delete('/series/{id}', 'SeriesController@destroy')->name('delete_serie');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporada/{temporada}/episodios/assistir', 'EpisodiosController@assistir');