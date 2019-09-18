<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comic;
use Faker\Generator as Faker;

$factory->define(Comic::class, function (Faker $faker) {
  $genre = [
	'Fantasy',
	'Action',
	'Supernatural',
	'Sci-fi',
  ];

  return [
	'title' => $faker->title(),
	'author' => $faker->name,
	'publisher' => $faker->company,
	'genre' => $genre[$faker->randomNumber(3)],
	'description' => $faker->sentence(20),
  ];
});
