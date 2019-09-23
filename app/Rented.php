<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rented extends Model
{
  public $timestamps = false;

  protected $fillable = [
	'user_idktp',
	'deadline',
	'comic_id',
	'is_returned',
	'returned_at',
	'rented_at'
  ];

  public function User()
  {
	return $this->belongsTo(\App\User::class);
  }

  public function Comic()
  {
	return $this->hasOne(\App\Comic::class);
  }

  public function RentedDetails()
  {
	return $this->hasMany(\App\RentedDetails::class);
  }
}
