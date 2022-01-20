<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/news/card/1');

        $response->assertStatus(200)
            ->assertSeeText('Заголовок')
            ->assertSeeText('jkljskljkljk');

    }
}
