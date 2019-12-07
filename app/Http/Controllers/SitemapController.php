<?php

namespace App\Http\Controllers;

class SitemapController
{
    public function sitemap()
    {
        return view('sitemap');
    }

    public function robots()
    {
        return view('robots');
    }
}
