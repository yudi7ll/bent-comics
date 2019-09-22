<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bent Comics') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
	  <!--
	  <nav class="navbar navbar-default">
		<div class="container-fluid">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		  </div>

		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
			  <li><a href="#">Link</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#">Action</a></li>
				  <li><a href="#">Another action</a></li>
				  <li><a href="#">Something else here</a></li>
				  <li role="separator" class="divider"></li>
				  <li><a href="#">Separated link</a></li>
				  <li role="separator" class="divider"></li>
				  <li><a href="#">One more separated link</a></li>
				</ul>
			  </li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="#">Link</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#">Action</a></li>
				  <li><a href="#">Another action</a></li>
				  <li><a href="#">Something else here</a></li>
				  <li role="separator" class="divider"></li>
				  <li><a href="#">Separated link</a></li>
				</ul>
			  </li>
			</ul>
		  </div>
		</div>
	  </nav>
	  -->
	  <main>
		@yield('content')
	  </main>
    </div>
</body>
</html>
