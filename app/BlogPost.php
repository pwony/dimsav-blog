<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class BlogPost implements Feedable
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

    public function __construct($config)
    {
        $this->id = $config['id'];
        $this->title = $config['title'];
        $this->summary = $config['summary'];
        $this->slug = $config['slug'];
        $this->published_at = Carbon::parse($config['published_at']);
        $this->modified_at = Carbon::parse($config['modified_at']);
        $this->image_url = asset($config['image_url']).'?v='.$this->modified_at->timestamp;
        $this->image_width = 1300;
        $this->image_height = 844;
        $this->published_date = $this->published_at->toFormattedDateString();
        $this->published_ago = $this->published_at->diffForHumans();
        $this->url = route('blog-post', $this->slug);
        $this->subjects = collect($config['subjects']);
    }

    /**
     * @return array|\Spatie\Feed\FeedItem
     */
    public function toFeedItem()
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'updated' => $this->modified_at,
            'link' => $this->url,
            'author' => 'Dimitris Savvopoulos',
        ]);
    }
}
