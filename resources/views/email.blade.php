@extends('default')

@section('content')
  <div class="column">
    @include('partials.message')
    <div class="ui clearing padded raised segment">
      <div class="ui basic segment">
        <div class="ui large dividing header">
          Mail
        </div>
        {!! Form::open(['route' => 'post_email', 'id' => 'file-email-form', 'files' => 'true', 'class' => 'ui form']) !!}
          <input type="file" id="file-email-input" name="files[]" multiple="true" style="visibility: hidden;">
          <div class="two fields">
            <div class="six wide field">
              <label>File</label>
              <div id="file-email-btn" class="ui fluid icon labeled button">
                <i class="file icon"></i>
                <div class="text">Select file(s)</div>
                <small class="desc"></small>
              </div>    
            </div>
            <div class="ten wide field">
              <label>Receiver</label>
              <select name="receiver" class="ui fluid selection dropdown">
                <option value="">Send to...</option>
                @foreach ($depts as $dept)
                  <option value="{{ $dept->id }}">
                    {{ $dept }} 
                    <small>
                      ({{ $dept->email }})
                    </small>
                  </option>
                @endforeach
              </select>
              <small>
                *Only departments with email are selectable. Departments that email are not yet set will not be shown here.
              </small>
            </div>
          </div>
          <button class="ui right floated teal button">
            Send email with attachment(s)
          </button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop