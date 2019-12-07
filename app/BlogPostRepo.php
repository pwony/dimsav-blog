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
     * @param BlogPost $post
     *
     * @return BlogPost|null
     */
    public static function findNextOf(BlogPost $post)
    {
        return BlogPostRepo::all()
                           ->where('published_at', '<', $post->published_at)
                           ->sortByDesc('published_at')
                           ->first();
    }

    /**
     * @return BlogPost|null
     */
    public static function findBySlug($slug)
    {
        return BlogPostRepo::all()->whereSlug($slug)->first();
    }


    /**
     * @return BlogPostCollection|BlogPost[]
     */
    public static function published()
    {
        return static::all()->onlyPublished();
    }
}
