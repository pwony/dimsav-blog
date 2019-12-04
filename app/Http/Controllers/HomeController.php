<?php

namespace App\Http\Controllers;

use App\BlogPost;

class HomeController extends Controller
{
    public function home()
    {
        $head_description = 'I\'m a web developer and indie hacker at metabook,'.
            ' and also a Co-organizer of the Laravel Athens User group and author '.
            'of Laravel Translatable. ';

        return view('home', [
            'head_canonical_url' => route('home'),
            'head_page_title' => 'Dimitris Blog',
            'head_description' => $head_description,
            'head_og_type' => 'website',
            'head_image' => '',
            'head_image_width' => '', // number in pixels
            'head_image_height' => '', // number in pixels
            'blog_posts' => BlogPost::published(),
        ]);
    }

    public function blogPost($slug)
    {
        if ($slug != 'how-to-use-vuejs-on-jquery-websites') {
            return redirect(route('post', 'how-to-use-vuejs-on-jquery-websites'));
        }

        $head_description = 'One of the reasons it was very hard for me to start using vueJs for a '.
            'long time on production is because I was mostly coding on existing websites whose '.
            'frontend was built with jQuery.';

        return view('post', [
            'head_canonical_url' => route('post', $slug),
            'head_page_title' => 'How to use VueJs on jQuery websites', // (max 70 characters)
            'head_description' => $head_description, //  (maximum 200 characters)
            'head_og_type' => 'article',
            'head_image' => '', // less than 5MB (duuhh)
            'head_image_width' => '', // number in pixels
            'head_image_height' => '', // number in pixels
            'head_article_tags' => collect(['jQuery', 'vueJs']),
            'head_article_published_time' => '2019-12-03T19:12:33.000Z',
            'head_article_modified_time' => '2019-12-03T19:12:33.000Z',
        ]);
    }
}
