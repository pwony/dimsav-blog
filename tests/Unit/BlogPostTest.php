<?php

namespace Tests\Unit;

use App\BlogPost;
use App\BlogPostCollection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Tests\TestCase;

class BlogPostTest extends TestCase
{
    public function testFetchingAllPosts()
    {
        $posts = BlogPost::all();

        $this->assertInstanceOf(BlogPostCollection::class, $posts);
        $this->assertTrue($posts->count() > 0);
        $this->assertInstanceOf(BlogPost::class, $posts->first());
    }

    public function testFindBySlug()
    {
        $post = BlogPost::all()->first();
        $this->assertEquals($post, BlogPost::findBySlug($post->slug));
    }

    public function testFetchAllPublished()
    {
        $posts = BlogPost::published();
        $this->assertInstanceOf(BlogPostCollection::class, $posts);
        $this->assertTrue($posts->count() > 0);
        $this->assertInstanceOf(BlogPost::class, $posts->first());
        foreach ($posts as $post) {
            $this->assertTrue($post->published_at < now());
        }
    }

    public function testPublishedDoesNotContainArticlesPostedInFuture()
    {
        $post = BlogPost::published()->first();
        $this->timeTravel($post->published_at->subDay());
        $publishedPost = BlogPost::published()
                                 ->filter(function (BlogPost $postIteration) use ($post) {
                                     return $postIteration->slug == $post->slug;
                                 })->first();
        $this->assertNull($publishedPost);
    }

    public function testAllBlogPostsContainRequiredProperties()
    {
        foreach (BlogPost::all() as $post) {
            $this->assertTrue(Str::length($post->title) > 0);
            $this->assertTrue(Str::length($post->slug) > 0);
            $this->assertTrue(Str::length($post->image_url) > 0);
            $this->assertTrue(Str::length($post->published_at_human_friendly) > 0);
            $this->assertInstanceOf(Carbon::class, $post->published_at);
        }
    }
}
