<?php

namespace App;

use Illuminate\Support\Carbon;

class BlogPost
{
    public $slug;
    public $published_at;

    public function __construct()
    {
        $this->slug = 'how-to-use-vuejs-on-jquery-websites';
        $this->published_at = Carbon::parse('Dec 3 2019');
    }

    public function getImageUrl()
    {
        return '/blog-img/1.jpg';
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
