<?php

namespace App\Http\Controllers;

use App\BlogPost;

class HomeController extends Controller
{
    public function home()
    {
        $head_description = 'I\'m a web developer and indie hacker at metabook,'.
            ' and also a Co-organizer of the Laravel Athens User group and author '.
            'of Laravel Translatable.';

        return view('home', [
            'head_canonical_url' => route('home'),
            'head_page_title' => 'Dimitris Blog',
            'head_description' => $head_description,
            'head_og_type' => 'website',
            'head_image' => asset('img/bg.jpg'),
            'head_image_width' => 2400,
            'head_image_height' => 1600,
            'blog_posts' => BlogPost::published(),
        ]);
    }

    public function blogPost($slug)
    {
        if (!$post = BlogPost::findBySlug($slug)) {
            abort(404);
        }

        return view('posts.'.$post->id, [
            'head_canonical_url' => $post->url,
            'head_page_title' => $post->title,
            'head_description' => $post->summary,
            'head_og_type' => 'article',
            'head_image' => $post->image_url,
            'head_image_width' => $post->image_width,
            'head_image_height' => $post->image_height,
            'head_article_tags' => $post->subjects,
            'head_article_published_time' => $post->published_at->format('c'),
            'head_article_modified_time' => $post->modified_at->format('c'),
            'blog_post' => $post,
        ]);
    }
}
