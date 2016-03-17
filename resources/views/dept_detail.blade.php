@extends('default')

@section('content')
  <div class="column">
    @include('partials.message')
    <div class="ui large header">
      <i class="building icon"></i>      
      <div class="content">
        {{ $dept }}
        <div class="sub header">
          Department Details | Courses
        </div>
      </div>
    </div>
    <div class="ui stackable column grid">
      <div class="six wide column">
        <div class="ui fluid card">
          <div class="content">
            {!! Form::open(['route' => ['dept_update', $dept->id], 'class' => 'ui form']) !!}
              <div class="field">
                <label>Email</label>
                <div class="ui left icon input">
                  <i class="at icon"></i>
                  {!! Form::email('email', $dept->email, ['placeholder' => 'Department email']) !!}
                </div>
              </div>
              <div class="right aligned field">
                <button class="ui small compact blue button">Update Email</button>
              </div>
            {!! Form::close() !!}
          </div>
          <div id="close-dept-btn" class="ui large basic extra button">
            Close department
          </div>
        </div>
      </div>
      <div class="ten wide column">
        <div class="ui clearing top attached segment">
          <div class="ui left floated header">
            Courses ({{ $dept->courses->count() }})
          </div>
          <div class="ui right floated compact teal icon labeled button">
            <i class="plus icon"></i>
            Create Course
          </div>
        </div>
        <div class="ui bottom attached segment" style="padding: 0">
          <table class="ui very basic striped table">
            <tbody>
              @forelse ($dept->courses as $course)
                <tr>
                  <td>
                    {{ $course }}
                  </td>
                </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  {!! Form::open(['route' => ['dept_remove', $dept->id], 'class' => 'ui small remove modal']) !!}
    <div class="header">
      <i class="inverted red circular warning icon"></i>
      Close Department
    </div>
    <div class="content">
      Are you sure you want to close this department, this 
      <strong>WILL REMOVE ALL CORRESPONDING COURSES</strong>.
    </div>
    <div class="actions">
      <div class="ui cancel button">Hold on</div>
      <button class="ui approve red button">Close department</button>
    </div>
  {!! Form::close() !!}
@stop