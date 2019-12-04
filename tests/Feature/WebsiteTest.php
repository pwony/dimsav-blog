<?php

namespace Tests\Feature;

use App\BlogPost;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBlogPostPage()
    {
        $posts = BlogPost::all();
        foreach ($posts as $post) {
            $re = $this->get($post->url)->assertStatus(200);
            $re->assertSeeText($post->title);
            $re->assertSeeText($post->summary);
            $re->assertSeeText($post->published_at_human_friendly);
        }
    }

    public function testNonExistingBlogPost()
    {
        $this->get('/blog/foobar')->assertStatus(404);
    }
}
