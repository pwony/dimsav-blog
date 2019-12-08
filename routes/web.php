<?php

Route::get('/', 'BlogController@home')->name('home');
Route::get('/blog/{slug}', 'BlogController@blogPost')->name('blog-post');
Route::get('/sitemap.txt', 'SitemapController@sitemap')->name('sitemap');
Route::get('/robots.txt', 'SitemapController@robots');

Route::feeds();

Route::get('/blog/posts/testing-a-live-site-with-laravel-dusk-using-docker-compose-20',
    'SeoController@duskArticle');
Route::get('contact', 'SeoController@goHome');
Route::get('about', 'SeoController@goHome');
Route::get('index.html', 'SeoController@goHome');
Route::get('laravel-translatable', 'SeoController@goHome');
Route::get('h/8365374.html', 'SeoController@goHome');
Route::get('blog/{id}/{slug}', 'SeoController@oldArticleNewUrl');
