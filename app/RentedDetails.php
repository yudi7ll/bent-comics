<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentedDetails extends Model
{
  protected $fillable = [
	'rented_id',
	'comic_id',
	'is_returned',
	'returned_at',
  ];

  public function Rented()
  {
	return $this->belongsTo(\App\Rented::class);
  }

  public function Comic()
  {
	return $this->hasOne(\App\Comic::class);
  }
}
