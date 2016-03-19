@extends('default')

@section('content')
   <div class="column">
   		<div class="ui text container">
   			@include('partials.errors')
      		@include('partials.message')
	      	<div class="ui center aligned padded raised segment">
	      		<div class="ui huge header">
	      			<div class="content">
		      			Recruit Mate
		      			<div class="sub header">
		      				Manager
		      			</div>
	      			</div>
	      		</div>
	      		<div class="ui basic clearing segment">
	      			{!! Form::open(['route' => 'login', 'class' => 'ui form']) !!}
		      			<div class="field {{ $errors->has('login') ? 'error' : '' }}">
		      				<div class="ui left icon input">
		      					<i class="user icon"></i>
		      					{!! Form::text('login', '', ['placeholder' => 'username | email']) !!}
		      				</div>
		      			</div>
		      			<div class="field {{ $errors->has('password') ? 'error' : '' }}">
		      				<div class="ui left icon input">
		      					<i class="privacy icon"></i>
		      					{!! Form::password('password', ['placeholder' => 'password']) !!}
		      				</div>
		      			</div>
		      			<div class="field" style="text-align: left">
			            	<div class="ui checkbox">
			             		{!! Form::checkbox('remember_me') !!}
			              		{!! Form::label('remember_me', 'Remember me') !!}
			            	</div>
			          	</div>
			          	<div class="field">
			          		{!! Form::submit('Login', ['class' => 'ui large right floated teal button']) !!}
			          	</div>
			      	{!! Form::close() !!}
	      		</div>
	      		<div class="ui divider"></div>
	      		<div class="ui basic segment">
	       			<a href="{{ asset('assets/download/recruitmate_v8.apk') }}" class="ui yellow icon labeled button">
	       				<i class="download icon"></i>
	       				<div class="content">
		       				Download Recruit Mate Android App (.apk)	       					
	       				</div>
	       			</a>
	      		</div>
	       	</div>
   		</div>
   </div>
@stop