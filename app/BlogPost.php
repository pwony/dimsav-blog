<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class BlogPost
{
    public $id;
    public $title;
    public $summary;
    public $slug;
    public $published_at;
    public $modified_at;
    public $published_at_human_friendly;
    public $image_url;
    /**
     * @var int number in pixels
     */
    public $image_width;
    /**
     * @var int number in pixels
     */
    public $image_height;
    public $url;

    /**
     * @var Collection
     */
    public $subjects;

    public function __construct()
    {
        $this->id = 1;
        $this->title = 'How to use VueJs on jQuery websites';
        $this->summary = 'One of the reasons it was very hard for me to start using vueJs is '.
            'because I was coding on existing websites whose frontend was built with jQuery.';
        $this->slug = 'how-to-use-vuejs-on-jquery-websites';
        $this->image_url = '/blog-img/1.jpg';
        $this->image_width = 160;
        $this->image_height = 120;
        $this->published_at_human_friendly = '3 days ago';
        $this->published_at = Carbon::parse('Dec 3 2019');
        $this->modified_at = Carbon::parse('Dec 3 2019');
        $this->url = route('blog-post', $this->slug);
        $this->subjects = collect(['jQuery', 'vueJs']);
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
