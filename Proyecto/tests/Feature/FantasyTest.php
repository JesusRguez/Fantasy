<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FantasyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testExample2()
    {
        $response = $this->get('/search');

        $response->assertStatus(200);
    }
    public function testExample3()
    {
        $response = $this->get('/create');

        $response->assertStatus(200);
    }
    public function testExample4()
    {
        $response = $this->get('/myfantasy');

        $response->assertStatus(200);
    }
    public function testExample5()
    {
        $response = $this->get('/fantasy');

        $response->assertStatus(200);
    }
}
