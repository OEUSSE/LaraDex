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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'welcome');

Route::get('/prueba/{name}', 'PruebaController@prueba');

# Route for TrainerController Controller make with artisan
Route::resource('trainers', 'TrainerController');
Route::resource('pokemons', 'PokemonController');

# Lists Routes
Route::get('/list-trainers', 'ListTrainerController@index');
Route::get('/list-pokemons', 'ListPokemonController@index');
# Api Route
Route::get('/api/trainer', 'ListTrainerController@getData');
Route::get('/api/pokemon', 'ListPokemonController@getData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
