@extends('default')

@section('content')
  <div class="column">
    @include('message')
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
        <div class="ui small dividing header">
          Department Emails
        </div>
        {!! Form::open(['route' => 'post_update_emails', 'class' => 'ui form']) !!}
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large calculator icon"></i>
                {{ ucwords('accounting, banking and finance') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('accounting', $settings['accounting, banking and finance'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large suitcase icon"></i>
                {{ ucwords('business and management') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('business', $settings['business and management'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large newspaper icon"></i>
                {{ ucwords('communication and media') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('communication', $settings['communication and media'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large plane icon"></i>
                {{ ucwords('hospitality and tourism management') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('hospitality', $settings['hospitality and tourism management'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large world icon"></i>
                {{ ucwords('humanities and social sciences') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('humanities', $settings['humanities and social sciences'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large laptop icon"></i>
                {{ ucwords('information technology') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('it', $settings['information technology'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="ui inline fields">
            <div class="ui four wide field">
              <label>
                <i class="large legal icon"></i>
                {{ ucwords('law') }}
              </label>
            </div>
            <div class="ui twelve wide field">
              <div class="ui left icon input">
                <i class="mail icon"></i>
                {!! Form::email('law', $settings['law'], ['placeholder' => 'Insert email for this department']) !!}
              </div>
            </div>
          </div>
          <div class="field" style="overflow: hidden;">
            <button class="ui right floated teal button">
              Update emails
            </button>
          </div>
        {!! Form::close() !!}
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
    <div class="header">Reset Database</div>
    <div class="content">
      Are you sure you want to reset the database, this 
      <strong>WILL REMOVE ALL RECORDS</strong> in the database.
      <div class="ui hidden divider"></div>
      <div class="ui form">
        <div class="field">
          <div class="ui checkbox">
            <label>Reset imported filename records as well</label>
            {!! Form::checkbox('all_reset', true) !!}
          </div>
          <div>
            <small>*This will allow you to reimport files that were imported before.</small>
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