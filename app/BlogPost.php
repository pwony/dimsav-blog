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
    public $published_date;
    public $published_ago;
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
        $this->title = 'How I use VueJs on jQuery legacy websites';
        $this->summary = 'One of the reasons it was very hard for me to start using vueJs is '.
            'because I was coding on existing websites whose frontend was built with jQuery.';
        $this->slug = 'how-i-use-vuejs-on-jquery-legacy-websites';
        $this->published_at = Carbon::parse('2019-12-04 12:00');
        $this->modified_at = Carbon::parse('2019-12-04 16:00');
        $this->image_url = asset('/blog-img/1.jpg').'?v='.$this->modified_at->timestamp;
        $this->image_width = 1300;
        $this->image_height = 844;
        $this->published_date = $this->published_at->toFormattedDateString();
        $this->published_ago = $this->published_at->diffForHumans();
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
