<?php

namespace App\Http\Controllers;

use App\BlogPostRepo;

class SeoController
{
    public function duskArticle()
    {
        return redirect(BlogPostRepo::findById(3)->url, 301);
    }

    public function s3Article()
    {
        return redirect(BlogPostRepo::findById(4)->url, 301);
    }

    public function goHome()
    {
        return redirect(route('home'), 301);
    }
}
