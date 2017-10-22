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

Route::group(['prefix' => 'form'], function () {
    Route::get('/{id}', ['as' => 'register.form', 'uses' => "RegisterFormController@showRegistration"]);
});

Route::get('/home', 'DisplayCvController@index')->name('home')->middleware('auth');

Route::group(['prefix' => '/finder', 'middleware' => 'isRecruiter'], function () {
    Route::get('/', ['as' => 'finder.show', 'uses' => "DisplayCvController@index"]);
    Route::get('/like/{id}', ['as' => 'finder.like', 'uses' => "DisplayCvController@like"]);
    Route::get('/dislike/{id}', ['as' => 'finder.dislike', 'uses' => "DisplayCvController@dislike"]);
});

Route::Resource('user', 'UserController')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/{id}', ['as' => 'admin.index', 'uses' => "AdminController@index"]);
    Route::post('/delete/{id}', ['as' => 'admin.delete', 'uses' => "AdminController@destroy"]);
    Route::post('/edit/{id}', ['as' => 'admin.edit', 'uses' => "AdminController@edit"]);
    Route::post('/delete_contact/{id}', ['as' => 'admin.delete_contact', 'uses' => "AdminController@destroy_contact"]);
    Route::post('/show/{id}', ['as' => 'admin.show', 'uses' => "AdminController@show"]);
});

Route::group(['prefix' => 'inbox', 'middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'inboxe.index', 'uses' => "InboxController@index"]);
    Route::get('/{id}/show', ['as' => 'inboxe.show', 'uses' => "InboxController@show"]);
    Route::get('/contacts', ['as' => 'inboxe.contacts', 'uses' => "InboxController@contacts"]);
    Route::get('{id}/newgroup', ['as' => 'inboxe.newgroup', 'uses' => "InboxController@newgroup"]);
    Route::post('{id}/send', ['as' => 'inboxe.send', 'uses' => "InboxController@send"]);
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/create', ['as' => 'contact.create', 'uses' => "ContactController@create"]);
    Route::post('/store', ['as' => 'contact.store', 'uses' => "ContactController@store"]);
});
