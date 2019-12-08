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
Route::get('/blog/18/how-to-cache-s3-stored-pictures-to-local-disk-and-serving-them-from-your-web-server',
    'SeoController@s3Article');
Route::get('/blog/9/git-repository-inside-composer-vendors',
    'SeoController@composerArticle');
Route::get('/blog/14/free-email-with-your-own-domain',
    'SeoController@goHome');
Route::get('contact', 'SeoController@goHome');
Route::get('about', 'SeoController@goHome');
Route::get('index.html', 'SeoController@goHome');
Route::get('laravel-translatable', 'SeoController@goHome');
Route::get('blog/12/phpstorm-phpspec', 'SeoController@goHome');
Route::get('h/8365374.html', 'SeoController@goHome');
Route::get('blog/11/cool-javascript-stuff-i-learned-at-the-open-techschool-workshop', 'SeoController@goHome');
Route::get('blog/5/apache-redirecting-www-to-no-www', 'SeoController@goHome');
