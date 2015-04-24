<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function register(){
		
		$user = new User;
		$user->username=Input::get('username');
		$user->password=Hash::make(Input::get('password'));
		$user->email=Input::get('email');
		$user->save();
		
		if ($user->save()){
			Session::flash('register_message', 'User registered');
			Session::flash('class', 'info');
		}
	
		else {
				Session::flash('5', 'An error has occurred , contact your system administrator');
				Session::flash('class', 'danger');
			 }

        	return Redirect::to('login');
		}
	
		public function login(){
				
		if(Auth::user())
			{
				//Load the diferent views variable
				
				return View::make('celebrityform');
			}
		else{
		 	return Redirect::to('login')->with('alert_login','You are not enter to the system');
		}
		
		
		}
		
		public function post_login(){
			$name=Input::get ('username');
			$pass=Input::get ('password');

			
				$userdata = array(
		'username' => Input::get ('username'),
		'password' => Input::get ('password')
		);

		if(Auth::attempt($userdata))
			{
				//Load the diferent views variable
				
				return View::make('celebrityform');
			
				
			}
		else{
		 	return Redirect::to('login')->with('alert_login','Invalid user ur password');
		}
	}
		
	

	public function logout(){
				
				Auth::logout();
				return Redirect::to('login');
		
	}
	

}
