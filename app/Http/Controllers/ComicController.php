<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
  public function __constructor(Comic $comic)
  {
	$this->comic = $comic;
  }

  /*
   * Store to Database
   * @return JSON
   */
  public function store(Request $request)
  {
	return $this->comic->insert($request->all());
  }

  public function update(Request $request)
  {
	//
  }
}
