<!DOCTYPE html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
     
    </title>


    {{ HTML::style('css/bootstrap.css'); }}
	 {{ HTML::style('css/my_style.css'); }}
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.js')}}
	

</head>
<body class="login-form">

    
	<div id="center-body" class="container">
    @yield('content')
    </div>

</body>
</html>
