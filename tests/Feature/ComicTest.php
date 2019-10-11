<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class ComicTest extends TestCase
{
    use RefreshDatabase;

    public function testAddNewComic()
    {
        $user = factory(\App\User::class)->create();
        $data = factory(\App\Comic::class)->make()->toArray();
        $data['cover'] = UploadedFile::fake()->image('img.jpg')->size(200);

        $this->actingAs($user, 'api');

        $response = $this->json('POST', '/api/comic', $data);

        $response
            ->assertSuccessful()
            ->assertSeeText('Successfully');

        $this->assertDatabaseHas('comics', $data);
    }

    public function testUpdateComic()
    {
        $newAuthor = 'Updated Author Test';
        $user = factory(\App\User::class)->create();
        $comic = factory(\App\Comic::class)->create();
        $data = [
            'author' => $newAuthor
        ];

        $this->actingAs($user, 'api');

        $response = $this->json('PUT', '/api/comic/' . $comic->id, $data);

        $response
            ->assertSuccessful()
            ->assertSeeText('Successfully');

        $this->assertDatabaseHas('comics', $data);
    }

    public function testDeleteComic()
    {
        $user = factory(\App\User::class)->create();
        $comic = factory(\App\Comic::class)->create();

        $this->actingAs($user, 'api');

        $response = $this->json('DELETE', '/api/comic/'.$comic->id);

        $response
            ->assertSuccessful();

        $this->assertDatabaseMissing('comics', $comic->toArray());
    }

    public function testGetOneComic()
    {
        $user = factory(\App\User::class)->create();
        $data = factory(\App\Comic::class)->create();

        $this->actingAs($user, 'api');

        $response = $this->json('GET', '/api/comic/'.$data->id);

        $response
            ->assertSuccessful()
            ->assertJson($data->toArray());
    }

    public function testGetAllComic()
    {
        $user = factory(\App\User::class)->create();
        $comic = factory(\App\Comic::class, 100)->create();

        $this->actingAs($user, 'api');

        $response = $this->json('GET', '/api/comic');

        $response
            ->assertSuccessful()
            ->assertJson($comic->toArray());
    }
}
