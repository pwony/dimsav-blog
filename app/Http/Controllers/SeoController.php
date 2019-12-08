<?php

namespace App\Http\Controllers;

use App\BlogPostRepo;

class SeoController
{
    public function duskArticle()
    {
        return redirect(BlogPostRepo::findById(3)->url, 301);
    }

    public function oldArticleNewUrl($oldArticleId)
    {
        $mapToPost = [
            1 => 6,
            9 => 5,
            18 => 4,
            20 => 3,
        ];
        if (isset($mapToPost[$oldArticleId])) {
            $newId = $mapToPost[$oldArticleId];
            return redirect(BlogPostRepo::findById($newId)->url, 301);
        }
        // 5, 11, 12, 14,
        return redirect(route('home'), 301);
    }

    public function goHome()
    {
        return redirect(route('home'), 301);
    }
}
