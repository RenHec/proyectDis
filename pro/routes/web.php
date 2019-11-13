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
})->middleware('guest');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::post('notes/store', 'NoteController@store')->name('notes.store')->middleware('permission:Crear Notas');
	Route::get('notes', 'NoteController@index')->name('notes.index')->middleware('permission:Index Notas');
	Route::get('notes/create', 'NoteController@create')->name('notes.create')->middleware('permission:Crear Notas');
	Route::put('notes/{note}', 'NoteController@update')->name('notes.update')->middleware('permission:Editar Notas');
	Route::get('notes/{note}', 'NoteController@show')->name('notes.show')->middleware('permission:Ver Notas');
	Route::delete('notes/{note}', 'NoteController@destroy')->name('notes.destroy')->middleware('permission:Eliminar Notas');
	Route::get('notes/{note}/edit', 'NoteController@edit')->name('notes.edit')->middleware('permission:Editar Notas');

	Route::resource('persons', 'PersonController');
	Route::get('anyData', 'PersonController@anyData')->name('persons.anyData');
});

