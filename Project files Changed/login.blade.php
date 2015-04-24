@extends('layouts.base')
@section('pageTitle')
<h1>Welcome To The Celebrity List Web Application!</h1>
@stop

@section('content')
<h1>Welcome To The Celebrity List Web Application!</h1>
<div class="row">
	<div class="col-lg-9"></div>
	<div class="col-lg-3">
		<div id="login-box">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Log in</h3>
				</div>
				<div  class="panel-body"> @if (Session::has('alert_login')) <span>{{ Session::get('alert_login') }}</span> @endif
					{{ Form::open(array('route' => 'login.user')) }}
					<div class="row">
						<div id="column" class="col-md-12">
						{{Form::text('username', null, ['id'=>'username', 'class'=>'form-control', 'require', 'placeholder'=>'Username' ]);}} 
						</div>
						<div id="column" class="col-md-12">
							{{Form::password('password', ['id'=>'password', 'require', 'class'=>'form-control', 'placeholder'=>'Password' ]);}}
						</div>
							
					</div>
					<button type="submit" class="btn btn-success">SEND</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div id="register-box">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Register</h3>
				</div>
				<div  class="panel-body"> @if (Session::has('register_message')) <span>{{ Session::get('register_message') }}</span> @endif
					{{ Form::open(array('route' => 'register.user')) }}
					<div class="row">
						<div class="col-md-12"> {{Form::text('username', null, ['id'=>'username', 'required'=>'required', 'class'=>'form-control', 'placeholder'=>'Username' ]);}} </div>
						<div class="col-md-12"> {{Form::password('password', ['id'=>'password', 'required'=>'required', 'class'=>'form-control', 'placeholder'=>'Password' ]);}} </div>
						<div class="col-md-12"> {{Form::text('email',null, ['id'=>'email', 'required'=>'required', 'class'=>'form-control', 'placeholder'=>'Email' ]);}} </div>
					</div>
					<button type="submit" class="btn btn-success">SEND</button>
					{{ Form::close() }} </div>
			</div>
		</div>
	</div>
</div>
@stop 