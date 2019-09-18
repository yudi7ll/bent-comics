<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
  protected $fillable = [
	'cover',
	'title',
	'author',
	'publisher',
	'genre',
	'description',
  ];
}
