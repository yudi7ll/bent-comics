<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

	protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	  'name',
	  'email',
	  'idktp',
	  'level',
	  'password',
	  'picture',
	  'birth_date',
	  'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function Rented()
	{
	  return $this->hasMany(\App\Rented::class);
	}

	public function updateValidate($request)
	{
	   return \Validator::make($request->all(), [
		'idktp' => [
		   'digits:16',
		   Rule::unique('users')->ignore(\Auth::user())
		 ],
		 'email' => [
		   'string',
		   Rule::unique('users')->ignore(\Auth::user())
		 ],
		 'birth_date' => 'date',
	  ]);
	}
}
