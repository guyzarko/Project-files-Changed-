<!-- Edward C. Champion  Guy Zarko CSC3700-->
 @extends('layouts.master')
@section('pageTitle')
<h1>Welcome To The Celebrity List Web Application!</h1>
@stop

@section('content')
{{Form::open(array('url' => 'celebrity1', 'method' => 'post', 'files' => true ))}}
<div class="row">
	<div class="col-lg-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><h3>
			</div>
			<div  class="panel-body">
				<label>
				<h3>
				Upload a picture of your favorite celebrity!
				{{Form::file('image') }}
				</label>
				<p>
				<label>
					<h3>
					Who is your favorite celebrity?
					</h3>
					{{Form::text('celebrity', null, [ 'class'=>'form-control', 'placeholder'=>'Celebrity name' ]); }} </label>
				</p>
				<label>
				<h3> What is your favorite <span style='color:red'>celebrity's website?</span> </h3>
				{{Form::text('web', null, [ 'class'=>'form-control', 'placeholder'=>'Celebrity website' ]); }}
				</label>
				</p>
				<p>
				<label>
					<h3>
					What is your favorite year of this celebrity<span style='color:white'>favorite celebrity?</span>
					</h3>
					{{Form::text('year', null, [ 'class'=>'form-control', 'placeholder'=>'Favorite year' ]); }}</label>
				</p>
				<p>
				<label>
					<h3>
					What is the category this celebrity is known for?
					</h3>
					{{Form::text('category', null, [ 'class'=>'form-control', 'placeholder'=>'Category' ]); }} </label>
				</p>
				<p>
				<label>
					<h3>
					What are your favorite celebrity's moments?
					</h3>
					{{Form::textarea('moments', null, [ 'class'=>'form-control']); }} </label>
				<span style='color:red'>*Maximum 2000 characters</span>
				</p>
				<p> {{Form::submit('SUBMIT')}} </p>
			</div>
		</div>
		{{Form::close()}}
	</div>
	<div class="col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"></h3>
			</div>
			<div  class="panel-body">
				<p> {{Form::open(array('url' => 'celebrity2', 'method' => 'get'))}}
				<p>
				<label>
					<h3>
					Enter Your ID number to see your celebrity list
					</h3>
					{{Form::text('id', null, [ 'class'=>'form-control', 'placeholder'=>'ID number' ]); }}
				</label>
				</p>
				<p> {{Form::submit('SHOWTIME!')}} </p>
				{{Form::close()}}
				{{Form::open(array('url' => 'celebrity4', 'method' => 'get'))}}
<p>
<label><h3>Enter Your ID number to update your celebrity list</h3>
{{Form::text('id') }} 
</label>
</p>
<table border='1'>
<tr>
<td>
Update celebrity photo 
{{Form::file('image') }}
</td>
</tr>
<tr>
<td>
{{Form::text('celebrity') }}
Update favorite celebrity 
</td>
</tr>
<tr>
<td>
{{Form::text('web') }}
Update celebrity website 
</td>
</tr>
<tr>
<td>
{{Form::text('year') }}
Update celebrity year 
</td>
</tr>
<tr>
<td> 
{{Form::text('category') }}
Update celebrity category 
</td>
</tr>
<tr>
<td>
{{Form::textarea('moments') }}
<p>
Update celebrity moments
</p>
<p> 
<span style='color:red'>*Maximum 2000 characters</span>	
</p>
</td>
</tr>
</table>
<p>
{{Form::submit('UPDATE')}} 
</p>
{{Form::close()}}
<hr>
<p>
</p>
{{Form::open(array('url' => 'celebrity3', 'method' => 'get'))}}
				<p> </p>
				{{Form::open(array('url' => 'celebrity3', 'method' => 'get'))}}
				<p>
				<label>
					<h3>
					Enter Your ID number to delete your celebrity list
					</h3>
					{{Form::text('id', null, [ 'class'=>'form-control', 'placeholder'=>'ID Number' ]); }} </label>
				</p>
				<p> {{Form::submit('DELETE!')}} </p>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop 