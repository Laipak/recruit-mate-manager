@extends('default')

@section('content')
   <div class="column">
   		@include('partials.message')
      	<div class="ui padded raised segment">
			<div class="ui basic segment">
				<div class="ui large dividing header">
					Import
				</div>
				<div class="ui hidden divider"></div>
				<div class="column">
					<div class="ui center aligned basic padded segment">
						<div id="file-import-btn" class="ui big icon labeled button">
							<i class="file icon"></i>
							Select and upload
						</div>
						{!! Form::open(['route' => 'post_import', 'id' => 'file-import-form', 'files' => 'true', 'style' => 'display: none;']) !!}
							<input type="file" id="file-import-input" name="imports[]" multiple="true">
						{!! Form::close() !!}
						<p>
							<small>
								*Upload and import .csv file.
							</small>
						</p>
					</div>
				</div>
			</div>
       	</div>
   </div>
@stop