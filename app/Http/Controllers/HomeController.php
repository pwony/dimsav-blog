<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        $head_description = 'I\'m a web developer and indie hacker at metabook,'.
            ' and also a Co-organizer of the Laravel Athens User group and author '.
            'of Laravel Translatable. ';

        return view('home', [
            'head_canonical_url' => route('home'),
            'head_page_title' => 'dimsav',
            'head_description' => $head_description,
            'head_og_type' => 'website',
            'head_image' => '',
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
            'head_page_title' => 'How to use VueJs on jQuery websites',
            'head_description' => $head_description,
            'head_og_type' => 'article',
            'head_image' => '',
            'head_article_tags' => ['jQuery', 'vueJs'],
        ]);
    }
}
