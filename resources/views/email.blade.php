@extends('default')

@section('content')
  <div class="column">
    @include('message')
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
                @foreach ($emails as $email)
                  <option value="{{ $email }}">
                    {{ $email }} 
                    <small>
                      ({{ get_settings($email) ? get_settings($email) : 'Not set' }})
                    </small>
                  </option>
                @endforeach
              </select>
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