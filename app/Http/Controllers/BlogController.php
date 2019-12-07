<?php

namespace App\Http\Controllers;

use App\BlogPostRepo;

class BlogController extends Controller
{
    public function home()
    {
        return view('home', [
            'head_canonical_url' => route('home'),
            'head_page_title' => config('blog.site_name'),
            'head_description' => config('blog.site_description'),
            'head_og_type' => 'website',
            'head_image' => asset('img/bg.jpg'),
            'head_image_width' => 2400,
            'head_image_height' => 1600,
            'blog_posts' => BlogPostRepo::published(),
        ]);
    }

    public function blogPost($slug)
    {
        if (!$post = BlogPostRepo::findBySlug($slug)) {
            abort(404);
        }

        $nextPost = BlogPostRepo::findNextOf($post);

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
            'next_blog_post' => $nextPost,
            'head_next_url' => $nextPost ? $nextPost->url : null,
        ]);
    }
}
