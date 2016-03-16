@extends('default')

@section('content')
   <div class="column">
   		<div class="ui text container">
   			@include('message')
	      	<div class="ui center aligned padded raised segment">
	      		<div class="ui huge header">
	      			<div class="content">
		      			Recruit Mate
		      			<div class="sub header">
		      				Admin Portal
		      			</div>
	      			</div>
	      		</div>
	      		<div class="ui basic clearing segment">
	      			{!! Form::open(['route' => 'post_login', 'class' => 'ui form']) !!}
		      			<div class="field">
		      				<div class="ui left icon input">
		      					<i class="user icon"></i>
		      					{!! Form::text('username', '', ['placeholder' => 'username']) !!}
		      				</div>
		      			</div>
		      			<div class="ui field">
		      				<div class="ui left icon input">
		      					<i class="privacy icon"></i>
		      					{!! Form::password('password', ['placeholder' => 'password']) !!}
		      				</div>
		      			</div>
		      			<button class="ui right floated teal button">
		      				Login
		      			</button>
			      	{!! Form::close() !!}
	      		</div>
	       	</div>
   		</div>
   </div>
@stop