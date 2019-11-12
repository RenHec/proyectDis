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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::post('notes/store', 'NoteController@store')->name('notes.store')->middleware('permission:notes.create');
	Route::get('notes', 'NoteController@index')->name('notes.index')->middleware('permission:notes.index');
	Route::get('notes/create', 'NoteController@create')->name('notes.create')->middleware('permission:notes.create');
	Route::put('notes/{note}', 'NoteController@update')->name('notes.update')->middleware('permission:notes.edit');
	Route::get('notes/{note}', 'NoteController@show')->name('notes.show')->middleware('permission:notes.show');
	Route::delete('notes/{note}', 'NoteController@destroy')->name('notes.destroy')->middleware('permission:notes.destroy');
	Route::get('notes/{note}/edit', 'NoteController@edit')->name('notes.edit')->middleware('permission:notes.edit');
});

