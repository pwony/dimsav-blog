<?php

namespace App\Http\Controllers;

class SeoController
{
    public function duskArticle()
    {
        return redirect(route('blog-post', 'testing-a-live-site-with-laravel-dusk-using-docker-compose'), 301);
    }
}
