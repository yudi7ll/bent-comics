@extends('layouts.app')

@section('content')
<div class="register container">
  <form class="register__form form-horizontal col-lg-offset-4 col-lg-4 row bg-white">
	<div class="form-group">
	  <h2 class="text-center">Join <b class="brand-name">Bent Comics</b></h2>
	</div>
	<div class="form-group">
	  <label for="email" class="col-sm-3 control-label">Email</label>
	  <div class="col-sm-9">
		<input type="email" class="form-control" id="email" placeholder="Email">
	  </div>
	</div>
	<div class="form-group">
	  <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
	  <div class="col-sm-9">
		<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
	  </div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-9">
		<button type="submit" class="btn btn-default">Register</button>
	  </div>
	</div>
  </form>
</div>
@endsection
