@extends('layouts.app')

@section('content')
<div class="container form">
  <div class="row">
	<form
	  class="form__box form-horizontal col-lg-offset-4 col-lg-4 bg-white"
	  method="POST"
	  action="/login"
	>
	  @csrf
	  <div class="form-group">
		<h2 class="text-center"><b class="brand-name">Bent Comics</b></h2>
	  </div>
	  <div class="{{ join(" ", ['form-group', ($errors->has('email')) ? 'has-error' : '']) }}">
		<label for="email" class="col-sm-3 control-label">Email</label>
		<div class="col-sm-9">
		  <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="{{ old('email') }}" autofocus />
		  <small class="text-danger">{{ $errors->first('email') }}</small>
		</div>
	  </div>
	  <div class="{{ join(" ", ['form-group', ($errors->has('password')) ? 'has-error' : '']) }}">
		<label for="password" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-9">
		  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
		  <small class="text-danger">{{ $errors->first('password') }}</small>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
		  <button type="submit" class="btn btn-danger">Login</button>
		</div>
	  </div>
	</form>
  </div>

  <div class="row">
	<div class="col-lg-offset-4 col-lg-4 form__box2 bg-white">
	  <div class="text-center">
		Doesn't have an account? <a href="/register">Register now</a>
	  </div>
	</div>
  </div>
</div>
@endsection
