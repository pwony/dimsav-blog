<?php

namespace Tests\Feature;

use App\BlogPostRepo;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertSee('<link rel="canonical" href="')
                 ->assertDontSee('<link rel="canonical" href=""');
    }

    public function testBlogPostPage()
    {
        $posts = BlogPostRepo::all();
        foreach ($posts as $post) {
            $this->get($post->url)
                 ->assertStatus(200)
                 ->assertSeeText($post->title)
                 ->assertSeeText($post->summary)
                 ->assertSeeText($post->published_date)
                 ->assertSee('<link rel="canonical" href="')
                 ->assertDontSee('<link rel="canonical" href=""');
        }
    }

    public function testNonExistingBlogPost()
    {
        $this->get('/blog/foobar')->assertStatus(404);
    }
}
