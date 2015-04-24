<!doctype html>
<html lang="en"
<head>
	<meta charset="UTF-8"
	<title></title>
	{{ HTML::style('css/celebrity_form.css') }}
    {{ HTML::script('http://laravel_amcharts2/js/amcharts/amcharts.js') }}
    {{ HTML::script('http://laravel_amcharts2/js/amcharts/serial.js') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/my_style.css'); }}


</head>
<body class="master">
<div class="span3">
			<ul class="nav nav-list">
				@if(Auth::user())
				<li class="nav-header">{{ ucwords(Auth::user()->username) }}</li>
				<li>{{ HTML::link('logout-user', 'Logout') }}</li>
				@else
				<li>{{ HTML::link('login', 'Login') }}</li>
				@endif
			</ul>
</div>
<div class='cbox'>
  	    @yield('pageTitle')
  	</div>
<div class="row-fluid">
	<div class="span12 well">
		<h1> </h1>
	</div>
	<div class="row-fluid">
		<div class="span9">
			@yield('content')
		</div>
</div>
	</body>
	</html>
