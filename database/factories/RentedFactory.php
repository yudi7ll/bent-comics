<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rented;
use Faker\Generator as Faker;

$factory->define(Rented::class, function (Faker $faker) {
  // if User is null return 123123
  $idktp = (new \App\User)->limit(1)->first() ?: 123123123;

  return [
	'user_idktp' => $idktp,
	'deadline' => \Illuminate\Support\Carbon::now()->addDay()->toDateTimeString()
  ];
});
