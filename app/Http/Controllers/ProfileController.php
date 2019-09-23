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

	$update = response()
	  ->json(\Auth::user()->update($request->all()));

	if (!$update) {
	  return response('Update Failed', 400);
	}

	return response('Profile Updated Successfully', 200);
  }

  public function updatePicture(Request $request)
  {
	return response()->json($request);
  }
}
