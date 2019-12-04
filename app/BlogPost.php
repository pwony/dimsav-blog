<?php

namespace App;

use Illuminate\Support\Carbon;

class BlogPost
{
    public $title;
    public $summary;
    public $slug;
    public $published_at;
    public $published_at_human_friendly;
    public $image_url;
    public $url;

    public function __construct()
    {
        $this->title = 'How to use VueJs on jQuery websites';
        $this->summary = 'One of the reasons it was very hard for me to start using vueJs is '.
            'because I was coding on existing websites whose frontend was built with jQuery.';
        $this->slug = 'how-to-use-vuejs-on-jquery-websites';
        $this->image_url = '/blog-img/1.jpg';
        $this->published_at_human_friendly = '3 days ago';
        $this->published_at = Carbon::parse('Dec 3 2019');
        $this->url = route('blog-post', $this->slug);
    }

    /**
     * @return BlogPostCollection|BlogPost[]
     */
    public static function all()
    {
        return new BlogPostCollection([new BlogPost()]);
    }

    /**
     * @return BlogPost|null
     */
    public static function findBySlug($slug)
    {
        return static::all()->whereSlug($slug)->first();
    }

    /**
     * @return BlogPostCollection|BlogPost[]
     */
    public static function published()
    {
        return static::all()->onlyPublished();
    }
}
