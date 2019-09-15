<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class RentingTest extends TestCase
{
  use RefreshDatabase;

  public function testRentingOneProduct()
  {
	$comic = factory(\App\Comic::class)->create();
	$user = factory(\App\User::class)->create();


	// session
	$this->actingAs($user, 'api');

	$response = $this->json('POST', '/api/rent', [
	  'user_idktp' => $user->first('idktp'),
	  'deadline' => Carbon::now()->addDay(2),
	  'comic_id' => $comic->id,
	]);

	$response
	  ->assertStatus(200);

	$this->assertDatabaseHas('comics', [
	  'user_idktp' => $user->first('idktp'),
	  'comic_id' => $comic->id
	]);
  }
}
