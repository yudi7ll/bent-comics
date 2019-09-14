<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  DB::table('users')->insert([
		'name' => 'admin',
		'email' => 'admin@admin.com',
		'idktp' => '123123123',
		'level' => 1,
		'password' => Hash::make('password'),
		'picture' => 'admin_cover.jpg',
		'birth_date' => '1999-10-03',
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now(),
		'api_token' => Str::random(60)
	  ]);
    }
}
