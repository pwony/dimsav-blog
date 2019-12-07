<?php

Route::get('/', 'BlogController@home')->name('home');
Route::get('/blog/{slug}', 'BlogController@blogPost')->name('blog-post');
Route::get('/sitemap.txt', 'SitemapController@index');

Route::get('/blog/posts/testing-a-live-site-with-laravel-dusk-using-docker-compose-20',
    'SeoController@duskArticle');