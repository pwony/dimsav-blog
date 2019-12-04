<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
