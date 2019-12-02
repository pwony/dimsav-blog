<?php

Route::get('/', 'HomeController@home');
Route::get('/blog/{slug}', 'HomeController@blogPost');



// tests
/**
 * 1. Each blog post has multiple hardcoded slugs (write only)
 * 2. Every secondary slug permanent redirects to the primary slug
 * 3. Make sure there is not duplicate slug
 * 4. Each blog post page has the required meta tags
 *      title, description, og:image, etc.
 * 5. Each blog post page returns a 200 status
 *
 *
 * Add google analytics
 * Add twitter follow me in twoitter
 */
