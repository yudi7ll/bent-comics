<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  $genres = [
		'Action',
		'Sci-Fi',
		'Romance',
		'Drama',
		'Supernatural',
		'Super Power',
		'Ecchi',
		'Horror',
		'Thriller',
		'Games',
		'Slice of life'
	  ];

	  for ($i = 0; $i < count($genres); $i++) {
		DB::table('genre')->insert([
		  'key' => strtolower(str_replace(' ', '', $genres[$i])),
		  'genre' => $genres[$i]
		]);
	  }
    }
}
