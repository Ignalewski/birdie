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

Route::get('/', 'NotesController@index')->name('index');

Auth::routes();

// shows users notes
Route::get('/user/{id}', 'NotesController@show_user_notes')->name('user');

// only for logged in users
Route::group(['middleware' => ['auth']], function () {

    // user dashboard
    Route::get('/home', 'NotesController@home')->name('home');

    Route::get('/add_note', 'NotesController@add_note')->name('add_note');
    Route::post('/post_note', 'NotesController@post_note')->name('post_note');
    Route::get('/banned', 'NotesController@banned')->name('banned');
});
