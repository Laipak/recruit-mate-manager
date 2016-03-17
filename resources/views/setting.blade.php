@extends('default')

@section('content')
  <div class="column">
    @include('partials.message')
    @include('partials.errors')
    <div class="ui inverted huge top attached segment header">
      Setting
    </div>
    <div class="ui bottom attached clearing padded segment">
      <div class="ui basic segment">
        <div class="ui small dividing header">
          Email
        </div>
        {!! Form::open(['route' => 'setting_update_email', 'class' => 'ui form']) !!}
          <div class="field">
            <div class="ui left icon input">
              <i class="at icon"></i>
              {!! Form::email('email', Sentinel::getUser()->email, ['placeholder' => 'Email']) !!}
            </div>
          </div>
          <div class="field" style="overflow: hidden;">
            <button class="ui right floated teal button">Update email</button>
          </div>
        {!! Form::close() !!}
        <div class="ui small dividing header">
          Password
        </div>
        {!! Form::open(['route' => 'setting_update_pw', 'class' => 'ui form']) !!}
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
        @if (Sentinel::inRole('admin'))
          <div class="ui hidden divider"></div>
          <div class="ui horizontal divider">
            Admin Privileges
          </div>
          <div class="ui top attached padded secondary clearing segment">
            <div class="ui small dividing header">
              User Creation
            </div>
            {!! Form::open(['route' => 'setting_create_user', 'class' => 'ui form']) !!}
              <div class="two fields">
                <div class="required field {{ $errors->has('first_name') ? 'error' : '' }}">
                  <label>First Name</label>
                  {!! Form::text('first_name', Input::get('first_name'), ['placeholder' => 'First name']) !!}
                </div>
                <div class="required field {{ $errors->has('last_name') ? 'error' : '' }}">
                  <label>Last Name</label>
                  {!! Form::text('last_name', Input::get('last_name'), ['placeholder' => 'Last name']) !!}
                </div>
              </div>
              <div class="two fields">
                <div class="required field {{ $errors->has('username') ? 'error' : '' }}">
                  <label>Username</label>
                  {!! Form::text('username', Input::get('username'), ['placeholder' => 'Username']) !!}
                </div>
                <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                  <label>Email</label>
                  <div class="ui left icon input">
                    <i class="at icon"></i>
                    {!! Form::email('email', Input::get('email'), ['placeholder' => 'Email']) !!}
                  </div>
                </div>
              </div>
              <div class="required field {{ $errors->has('password') | $errors->has('password_confirmation') ? 'error' : '' }}">
                <label>Password</label>
                <div class="two fields">
                  <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                    {!! Form::password('password', ['placeholder' => 'Password']) !!}
                  </div>
                  <div class="field {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                    {!! Form::password('password_confirmation', ['placeholder' => 'Confirmation']) !!}
                  </div>
                </div>
              </div>
              <div class="two fields">
                <div class="field">
                  <div class="ui checkbox">
                    {!! Form::checkbox('is_admin') !!}
                    <label>
                      Admin 
                      <small>
                        (This user will be registered as an admin)
                      </small>
                    </label>
                  </div>
                </div>
                <div class="field">
                  <button class="ui right floated teal button">Create</button>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
          <div class="ui bottom attached secondary padded segment">
            <div id="reset-db-btn" class="ui red fluid button">
              RESET DATABASE
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  {!! Form::open(['route' => 'setting_reset', 'class' => 'ui small reset modal']) !!}
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