@extends('default')

@section('content')
  <div class="column">
    @include('partials.message')
    <div class="ui inverted huge top attached segment header">
      Setting
    </div>
    <div class="ui bottom attached clearing padded segment">
      <div class="ui basic segment">
        <div class="ui small dividing header">
          Password
        </div>
        {!! Form::open(['route' => 'post_change_pw', 'class' => 'ui form']) !!}
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              {!! Form::password('current_pw', ['placeholder' => 'Current password']) !!}
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="privacy icon"></i>
              {!! Form::password('new_pw', ['placeholder' => 'New password']) !!}
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="privacy icon"></i>
              {!! Form::password('new_pw_confirmation', ['placeholder' => 'Confirm password']) !!}
            </div>
          </div>
          <div class="field" style="overflow: hidden;">
            <button class="ui right floated teal button">Change password</button>
          </div>
        {!! Form::close() !!}
        <div class="ui hidden divider"></div>
        <div class="ui divider"></div>
        <div class="ui hidden divider"></div>
        <div class="field">
          <div id="reset-db-btn" class="ui red fluid button">
            RESET DATABASE
          </div>
        </div>
      </div>
    </div>
  </div>
  {!! Form::open(['route' => 'post_reset', 'class' => 'ui small reset modal']) !!}
    <div class="header">
      <i class="inverted red circular warning icon"></i>
      Reset Database
    </div>
    <div class="content">
      Are you sure you want to reset the database, this 
      <strong>WILL REMOVE ALL APPLICANT RECORDS</strong> in the database.
      <div class="ui hidden divider"></div>
      <div class="ui form">
        <div class="field">
          <div class="ui checkbox">
            <label>Reset imported filename records as well</label>
            {!! Form::checkbox('reset_import', true) !!}
          </div>
          <div>
            <small>*This will allow you to reimport files that were imported before.</small>
          </div>
        </div>
        <div class="ui divider"></div>
        <div class="ui field">
          <div class="ui checkbox">
            <label>Reset departments</label>
            {!! Form::checkbox('reset_dept', true) !!}
          </div>
           <div>
            <small>*This will remove all created departments and corresponding courses.</small>
          </div>
        </div>
      </div>
    </div>
    <div class="actions">
      <div class="ui cancel button">Hold on</div>
      <button class="ui approve red button">Reset</button>
    </div>
  {!! Form::close() !!}
@stop