<?php

Route::get('/', 'BlogController@home')->name('home');
Route::get('/blog/{slug}', 'BlogController@blogPost')->name('blog-post');
Route::get('/sitemap.txt', 'SitemapController@sitemap')->name('sitemap');
Route::get('/robots.txt', 'SitemapController@robots');

Route::feeds();

Route::get('/blog/posts/testing-a-live-site-with-laravel-dusk-using-docker-compose-20',
    'SeoController@duskArticle');
Route::get('/blog/20/testing-a-live-site-with-laravel-dusk-using-docker-compose',
    'SeoController@duskArticle');
Route::get('/blog/14/free-email-with-your-own-domain',
    'SeoController@goHome');
Route::get('/blog/9/git-repository-inside-composer-vendors',
    'SeoController@goHome');