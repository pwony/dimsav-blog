<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    public function __construct()
    {
        View::share('site_name', config('blog.site_name'));
        View::share('twitter_url', config('blog.twitter_url'));
        View::share('twitter_handle', config('blog.twitter_handle'));
        View::share('site_image_url', asset('img/bg.jpg'));
    }
}
