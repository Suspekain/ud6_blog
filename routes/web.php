<?php

Route::get('/', 'BlogController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
