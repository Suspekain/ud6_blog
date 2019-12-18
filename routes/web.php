<?php

Route::get('/', 'BlogController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController')->only(['index', 'show', 'create','store', 'edit', 'update', 'destroy']);

Route::get('/admin', function () {
    return view('admin');
});
