<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class ProfileUpdateTest extends TestCase
{
  use RefreshDatabase;

  public function testProfileUpdate()
  {
	$user = factory(\App\User::class)->create();

	$this->actingAs($user, 'api');

	$response = $this->json('PUT', '/api/user', [
	  'email' => 'newemail@new.com',
	  'birth_date' => Carbon::parse('1999-03-10')->toDateTimeString()
	]);

	$response
	  ->assertStatus(200)
	  ->assertSee('Successfully');
  }

  /*
   * TODO: testUpdateProfilePicture()
   */
}
