<?php

namespace Tests\Unit;

use App\BlogPost;
use App\BlogPostCollection;
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
        $this->assertEquals($post, BlogPost::findBySlug($post->getSlug()));
    }

    public function testFetchAllPublished()
    {
        $posts = BlogPost::published();
        $this->assertInstanceOf(BlogPostCollection::class, $posts);
        $this->assertTrue($posts->count() > 0);
        $this->assertInstanceOf(BlogPost::class, $posts->first());
        foreach ($posts as $post) {
            $this->assertTrue($post->getPublishedAt() < now());
        }
    }

    public function testPublishedDoesNotContainArticlesPostedInFuture()
    {
        $post = BlogPost::published()->first();
        $this->timeTravel($post->getPublishedAt()->subDay());
        $publishedPost = BlogPost::published()
                                 ->filter(function (BlogPost $postIteration) use ($post) {
                                     return $postIteration->getSlug() == $post->getSlug();
                                 })->first();
        $this->assertNull($publishedPost);
    }
}
