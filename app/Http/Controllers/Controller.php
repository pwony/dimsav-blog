<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    public function __construct()
    {
        View::share('site_name', 'Dimitris Blog');
        View::share('twitter_url', 'https://twitter.com/dimsav');
        View::share('twitter_handle', '@dimsav');
    }
}
