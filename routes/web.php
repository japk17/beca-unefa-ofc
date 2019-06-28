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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','role:super-admin|lector|moderador']], function() {
    Route::resource('usuarios', 'UsersController');
    Route::get('users-delete/{id}', 'UsersController@destroy')->name('usuarios.delete');
});

Route::group(['prefix' => 'cuposbecas','middleware' => 'auth'], function() {
    Route::resource('cuposbecas', 'CuposBecasController');
    Route::get('Add-cupo', 'CuposBecasController@addView')->name('add.view.cupo.beca');
    Route::get('pre-eliminar-cupo/{id}', 'CuposBecasController@eliminar')->name('pre-eliminar.cupo.beca');
});

Route::get('guia/',function(){
    return view('guia');
});

Route::get('users', 'UsersController@index');

Route::get('users-list', 'UsersController@usersList')->name('users-list'); 