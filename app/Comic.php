<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'genre',
        'description',
        'rent_price',
    ];
}
