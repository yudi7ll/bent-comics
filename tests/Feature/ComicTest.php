<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComicTest extends TestCase
{
    use RefreshDatabase;

    public function testAddNewComic()
    {
        $user = factory(\App\User::class)->create();
        $data = factory(\App\Comic::class)->make()->toArray();

        $this->actingAs($user, 'api');

        $response = $this->json('POST', '/api/comic', $data);

        $response
            ->assertSuccessful()
            ->assertSeeText('Successfully');
    }
}
