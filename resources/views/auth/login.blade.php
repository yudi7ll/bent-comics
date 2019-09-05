@extends('layouts.app')

@section('content')
<div class="container">
  <form method="POST" action="{{ route('login') }}">
	@csrf
	<div class="form-group">
	  <label for="email">Email address</label>
	  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="admin@admin.com">
	</div>
	<div class="form-group">
	  <label for="password">Password</label>
	  <input type="password" class="form-control" id="password" name="password" value="{{ old('email') }}" placeholder="password">
	</div>
	<div class="checkbox">
	  <label>
		<input type="checkbox">Remember me!
	  </label>
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>
@endsection
