@extends('layouts.app')

@section('content')
<div class="container form">
  <div class="row">
	<form class="form__box form-horizontal col-lg-offset-4 col-lg-4 bg-white" method="POST" action="/register">
	  @csrf
	  <div class="form-group">
		<h2 class="text-center brand-name">Join <b>Bent Comics</b></h2>
	  </div>
	  <div class="form-group">
		<label for="name" class="col-sm-3 control-label">Name</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required old('name') >
		</div>
	  </div>
	  <div class="form-group">
		<label for="idktp" class="col-sm-3 control-label">ID. KTP</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" id="idktp" name="idktp" placeholder="Ex. 517101030XXXXXXX" required old('idktp')>
		</div>
	  </div>
	  <div class="form-group">
		<label for="email" class="col-sm-3 control-label">Email</label>
		<div class="col-sm-9">
		  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required old('email')>
		</div>
	  </div>
	  <div class="form-group">
		<label for="password" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-9">
		  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="password2" class="col-sm-3 control-label"></label>
		<div class="col-sm-9">
		  <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Confirm Password" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="birthdate" class="col-sm-3 control-label">Birth Date</label>
		<div class="col-sm-9">
		  <input type="date" class="form-control" id="birthdate" name="birth_date" required old('birth_date')>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
		  <button type="submit" class="btn btn-danger">Register</button>
		</div>
	  </div>
	</form>
  </div>
  
  <div class="row">
	<div class="form__box2 col-lg-offset-4 col-lg-4 bg-white">
	  <div class="text-center">
		Already have an account? <a href="/login">Login</a>
	  </div>
	</div>
  </div>
</div>
@endsection
