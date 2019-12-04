<?php

namespace App;

use Illuminate\Support\Carbon;

class BlogPost
{
    public function getImageUrl()
    {
        return '/blog-img/1.jpg';
    }

    public function getSlug()
    {
        return 'how-to-use-vuejs-on-jquery-websites';
    }

    public function getPublishedAt()
    {
        return Carbon::parse('Dec 3 2019');
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
