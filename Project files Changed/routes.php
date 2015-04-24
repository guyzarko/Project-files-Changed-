<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/weather_interface', function()
{
	return View::make('weatherform2');
});
Route::post('/weather', function()
{
	if (!isset($_REQUEST['average']))
	{ $average = 'no';}
	else
	$average = $_REQUEST['average'];
	if (!isset($_REQUEST['high']))
	{ $high = 'no';}
	else
	$high = $_REQUEST['high'];
	if (!isset($_REQUEST['low']))
	{ $low = 'no';}
	else
	$low = $_REQUEST['low'];
	return View::make('graph3')->with('title', $_REQUEST['title'])
		->with('average', $average)
		->with('high', $high)
		->with('low', $low);
});
Route::get('/celebrity_interface', function()
{
	return View::make('celebrityform');
});

Route::post('/celebrity1', function() {
	$celebrityfavorite1 = new celebrityfavorites();
	$celebrity1 = $_REQUEST['celebrity'];
	$celebrityfavorite1->celebrityfavorite = "$celebrity1";
	$celebrity2 = $_REQUEST['web'];
	$celebrityfavorite1->celebrityweb = "$celebrity2";
	$celebrity3 = $_REQUEST['year'];
	$celebrityfavorite1->celebrityyear = "$celebrity3";
	$celebrity4 = $_REQUEST['category'];
	$celebrityfavorite1->celebritycategory = "$celebrity4";
	$celebrity5 = $_REQUEST['moments'];
	$celebrityfavorite1->celebritymoment = "$celebrity5";
	$celebrity6 = Input::file('image');
	$celebrityfavorite1->celebrityphoto = "$celebrity6";
	$celebrityfavorite1->save();
	$str = "<h1><span style='color:red'>Your ID number is: </h1>". $celebrityfavorite1->id;
	return $str;
		
});
Route::get('/celebrity2', function () {
	$id = $_REQUEST['id'];
	$list = DB::select("SELECT celebrityfavorite, celebrityweb, celebrityyear, celebritycategory,
		celebritymoment, celebrityphoto from celebrityfavorites where id=$id");
		print "<br /> <h1>Your Celebrity List is :</h1>";
		print "<table border='50' style='width:40%'>";
		print "<tr>";
		print "<td>";
		print "<br /> <h3>Your favorite celebrity :</h3>" . $list[0]->celebrityfavorite;
		print "</td>"; 
		print "</tr>";
		print "<tr>";
		print "<td>";
		print "<br /> <h3>Your favorite celebrity website :</h3>" . $list[0]->celebrityweb;
		print "</td>"; 
		print "</tr>";
		print "<tr>";
		print "<td>"; 
		print "<br /> <h3>Your favorite celebrity year :</h3>" . $list[0]->celebrityyear; 
		print "</td>"; 
		print "</tr>";
		print "<tr>";
		print "<td>";
		print "<br /> <h3>Your favorite celebrity category :</h3>" . $list[0]->celebritycategory; 
		print "</td>"; 
		print "</tr>";
		print "<tr>";
		print "<td>";
		print "<br /> <h3>Your favorite celebrity moment :</h3>" . $list[0]->celebritymoment;
		print "</td>"; 
		print "</tr>";
		print "<tr>";
		print "<td>";
		print "<br /> <h3>Your favorite celebrity photo:</h3>" . $list[0]->celebrityphoto; 
		print "</td>"; 
		print "</tr>";
		print "</table>";
		print "<h2><span style='color:red'>Return to celebrity interface to create, update, or delete your list";
		
});
Route::get('/celebrity3', function () {
	$id2 = array($_REQUEST['id']);
	$users = DB::update( "DELETE from celebrityfavorites WHERE id=?", $id2 );    
	return "<h1><span style='color:red'>Your celebrity list has been deleted = $id2[0] </h1>";
	
});
Route::get('/celebrity4', function () {
	$id2 = array($_REQUEST['id']);
	DB::table('celebrityfavorites')->whereId($id2)->update(array('celebrityphoto' => Input::file('image')));
	DB::table('celebrityfavorites')->whereId($id2)->update(array('celebrityfavorite' => $_REQUEST['celebrity']));
	DB::table('celebrityfavorites')->whereId($id2)->update(array('celebrityweb' => $_REQUEST['web']));
	DB::table('celebrityfavorites')->whereId($id2)->update(array('celebrityyear' => $_REQUEST['year']));
	DB::table('celebrityfavorites')->whereId($id2)->update(array('celebritycategory' => $_REQUEST['category']));
	DB::table('celebrityfavorites')->whereId($id2)->update(array('celebritymoment' => $_REQUEST['moments']));
	return "<h1><span style='color:red'>Your celebrity list has been updated = $id2[0]</h1>";
	
});
Route::get('/login', function()
{
	return View::make('login');
});



Route::any('login-user',  array('as'=> 'login.user', 'uses' => 'UserController@post_login'));

Route::post('register-user',  array('as'=> 'register.user', 'uses' => 'UserController@register'));

Route::any('logout-user',  array('as'=> 'logout.user', 'uses' => 'UserController@logout'));

//CLOSE

Route::get('/register', function(){

    return View::make('register');
});

Route::get('/example', function()
{
    // Return our basic form view
    return View::make("form");
});

Route::post('/', function()
{
    // Build the input for our validation
    $input = array('image' => Input::file('image'));

    // Within the ruleset, make sure we let the validator know that this
    // file should be an image
    $rules = array(
        'image' => 'image'
    );

    // Now pass the input and rules into the validator
    $validator = Validator::make($input, $rules);

    // Check to see if validation fails or passes
    if ($validator->fails())
    {
        // Redirect with a helpful message to inform the user that 
        // the provided file was not an adequate type
        return Redirect::to('/')->with('message', 'Error: The provided file was not an image');
    } else
    {
        // Actually go and store the file now, then inform 
        // the user we successfully uploaded the file they chose
        return Redirect::to('/')->with('message', 'Success: File upload was successful');
    }
});

Route::get('/upload', function() {
  return View::make('upload');
});
Route::post('apply/upload', 'ApplyController@upload');