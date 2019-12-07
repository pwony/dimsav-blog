<?php

Route::get('/', 'HomeController@home')->name('home');
Route::get('/blog/{slug}', 'HomeController@blogPost')->name('blog-post');

Route::get('/blog/posts/testing-a-live-site-with-laravel-dusk-using-docker-compose-20',
    'SeoController@duskArticle');