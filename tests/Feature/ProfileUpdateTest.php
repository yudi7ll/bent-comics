<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateTest extends TestCase
{
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

    public function testUpdateProfilePicture()
    {
        Storage::fake('test');

        $user = factory(\App\User::class)->create();
        $file = UploadedFile::fake()->create('test.jpg')->size(100);

        $this->actingAs($user, 'api');

        $response = $this->json('POST', '/api/user/picture', [
            'picture' => $file
        ]);

        $response
            ->assertSuccessful()
            ->assertSeeText('Successfully');

        $this->assertDatabaseHas('users', [
            'picture' => $user->idktp . '.jpg'
        ]);
    }
}
