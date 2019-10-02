<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
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


        // !! password row will be deleted
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
