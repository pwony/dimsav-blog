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
            $this->get($post->url)->assertStatus(200);
        }
    }

    public function testNonExistingBlogPost()
    {
        $this->get('/blog/foobar')->assertStatus(404);
    }
}
