<?php

namespace Tests\Unit;

use App\BlogPost;
use App\BlogPostCollection;
use App\BlogPostRepo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Tests\TestCase;

class BlogPostTest extends TestCase
{
    public function testFetchingAllPosts()
    {
        $posts = BlogPostRepo::all();

        $this->assertInstanceOf(BlogPostCollection::class, $posts);
        $this->assertTrue($posts->count() > 0);
        $this->assertInstanceOf(BlogPost::class, $posts->first());
    }

    public function testFindBySlug()
    {
        $post = BlogPostRepo::all()->first();
        $this->assertEquals($post, BlogPostRepo::findBySlug($post->slug));
    }

    public function testFetchAllPublished()
    {
        $posts = BlogPostRepo::published();
        $this->assertInstanceOf(BlogPostCollection::class, $posts);
        $this->assertTrue($posts->count() > 0);
        $this->assertInstanceOf(BlogPost::class, $posts->first());
        foreach ($posts as $post) {
            $this->assertTrue($post->published_at < now());
        }
    }

    public function testPublishedDoesNotContainArticlesPostedInFuture()
    {
        $post = BlogPostRepo::published()->first();
        $this->timeTravel($post->published_at->subDay());
        $publishedPost = BlogPostRepo::published()
                                 ->filter(function (BlogPost $postIteration) use ($post) {
                                     return $postIteration->slug == $post->slug;
                                 })->first();
        $this->assertNull($publishedPost);
    }

    public function testAllBlogPostsContainRequiredProperties()
    {
        foreach (BlogPostRepo::all() as $post) {
            $this->assertPositiveInteger($post->id);
            $this->assertTrue(Str::length($post->title) > 0);
            $this->assertTrue(Str::length($post->title) <= 70);
            $this->assertTrue(Str::length($post->summary) > 0);
            $this->assertTrue(Str::length($post->summary) <= 200);
            $this->assertTrue(Str::length($post->slug) > 0);
            $this->assertTrue(Str::length($post->image_url) > 0);
            $this->assertStringContainsString('://', $post->image_url);
            $this->assertTrue(Str::length($post->published_ago) > 0);
            $this->assertTrue(Str::length($post->published_date) > 0);
            $this->assertPositiveInteger($post->image_height);
            $this->assertPositiveInteger($post->image_width);
            $this->assertInstanceOf(Carbon::class, $post->published_at);
            $this->assertInstanceOf(Carbon::class, $post->modified_at);
            $this->assertInstanceOf(Collection::class, $post->subjects);
            $this->assertPositiveInteger($post->subjects->count());
        }
    }
}
