<?php

Route::get('/', 'HomeController@home')->name('home');
Route::get('/blog/{slug}', 'HomeController@blogPost')->name('post');
