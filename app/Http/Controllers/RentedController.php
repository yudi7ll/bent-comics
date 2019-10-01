<?php

namespace App\Http\Controllers;

use App\Rented;
use Illuminate\Http\Request;

class RentedController extends Controller
{
  private $rented;

  public function __construct(Rented $rented)
  {
	$this->rented = $rented;
  }

  /*
   * @return [array] All Data
   */
  public function get()
  {
	return $this->rented->all();
  }

  /*
   * @return [object] One data
   */
  public function getOne($id)
  {
	return $this->rented->find($id);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return $rentedId
   */
  public function store(Request $request)
  {
  	//insert new data & return the id
	$rentedId = $this->rented->insertGetId([
	  'user_id' => \Auth::user()->idktp,
	  'deadline' => $request->deadline
	]);

	foreach ($request->comic_id as $comic_id) {
	  $this->rented->RentedDetails()->insert([
		'rented_id' => $rentedId,
		'comic_id' => $comic_id
	  ]);
	}

	return response('Data Saved Successfully', 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Rented  $rented
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
	try {

	  $this
		->rented
		->find($id)
		->update($request->all());

	} catch (\Exception  $exception) {
	  return $exception->getMessage();
	}

	return response('Update Successfully', 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Rented  $rented
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
	try {

	  $this->rented->findOrFail($request->id)->delete();

	} catch (\Exception  $exception) {
	  return $exception->getMessage();
	}

	return response('Successfully Deleted!', 200);
  }
}
