<?php

namespace App;

class BlogPostRepo
{
    /**
     * @return BlogPostCollection|BlogPost[]
     */
    public static function all()
    {
        $collection = new BlogPostCollection;
        foreach (config('blog-posts') as $config) {
            $collection->push(new BlogPost($config));
        }
        return $collection->sortByDesc(function (BlogPost $post) {
            return $post->published_at;
        });
    }


    /**
     * @return BlogPostCollection|BlogPost[]
     */
    public static function published()
    {
        return static::all()->onlyPublished();
    }
}
