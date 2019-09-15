<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
  // reset the database after test
  use RefreshDatabase;

  public function testRegister()
  {
	$newUser = [
	  'name' => 'yudi',
	  'email' => 'yudi@email.com',
	  'idktp' => '2341254125',
	  'password' => 'password',
	  'level' => 1,
	  'password_confirmation' => 'password',
	  'birth_date' => '1999-10-19',
	];
	$response = $this->json('POST', '/register', $newUser);

	$response
	  ->assertStatus(302)
	  ->assertRedirect('/');
	

	// !! password row will be encrypted
	unset($newUser['password']);
	unset($newUser['password_confirmation']);

	$this->assertDatabaseHas('users', $newUser);
  }

  public function testLogin()
  {
	// db:seed before login
	$this->seed();

	$response = $this->json('POST', '/login', [
	  'email' => 'admin@admin.com',
	  'password' => 'password'
	]);

	$response
	  ->assertStatus(302)
	  ->assertRedirect('/');
  }

  public function testRedirectWithoutLogin()
  {
	$response = $this->get('/admin');

	$response
	  ->assertStatus(302)
	  ->assertRedirect('/login');
  }
}
