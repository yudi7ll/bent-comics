<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
  private $user;

  public function __construct(User $user)
  {
	$this->user = $user;
  }

  public function update(Request $request)
  {
	// validate request
	$validate = $this->user->updateValidate($request);

	if ($validate->fails()) {
	  return response()->json($validate->messages());
	}

	return response()
	  ->json(\Auth::user()->update($request->all()));
  }
}
