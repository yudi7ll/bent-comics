<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Carbon;

class RentingTest extends TestCase
{
    public function testRentingOneProduct()
    {
        $user = factory(\App\User::class)->create();
        $comic = factory(\App\Comic::class, 3)->create();

        // session login
        $this->actingAs($user, 'api');

        $response = $this->json('POST', '/api/rent', [
            'deadline' => Carbon::now()->addDay()->toDateTimeString(),
            'comic_id' => $comic->map(function($c) {
              // return only the id
              return $c->id;
            })
        ]);

        $response
            ->assertStatus(200)
            ->assertSee('Successfully');

        $this->assertDatabaseHas('renteds', [
            'is_returned' => 0
        ]);
    }

    public function testUpdateRentedComic()
    {
        $user = factory(\App\User::class)->create();
        $rented = factory(\App\Rented::class)->create();

        $this->actingAs($user, 'api');

        $response = $this->json('PUT', '/api/rent/'.$rented->id, [
            'is_returned' => 1,
            'returned_at' => Carbon::now()->toDateTimeString()
        ]);

        $response
            ->assertStatus(200)
            ->assertSee('Successfully');

        $this->assertDatabaseHas('renteds', [
            'is_returned' => 1
        ]);
    }
}
