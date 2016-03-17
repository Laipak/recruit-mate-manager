@extends('default')

@section('content')
  <div class="column">
    @include('partials.message')
    @include('partials.errors')
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
          <div id="create-course-btn" class="ui right floated compact teal icon labeled button">
            <i class="plus icon"></i>
            Create New Course
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
                  <td class="right aligned">
                    <div class="ui blue update course compact icon button" data-content="Edit" data-variation="inverted" data-position="left center" data-id="{{ $course->id }}" data-name="{{ $course }}">
                      <i class="write icon"></i>
                    </div>
                    <div class="ui red remove course compact icon button" data-content="Remove" data-variation="inverted" data-position="right center" data-id="{{ $course->id }}" data-name="{{ $course }}">
                      <i class="trash icon"></i>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="2" class="center aligned">
                    <div class="ui basic padded segment">
                      <div class="ui small disabled icon header">
                        <i class="info circle icon"></i>
                        <div class="content">
                          No courses found
                          <div class="sub header">
                            Create new course ?
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  {!! Form::open(['route' => ['dept_remove', $dept->id], 'class' => 'ui small remove dept modal']) !!}
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

  {!! Form::open(['route' => ['course_create', $dept->id], 'class' => 'ui small create course modal']) !!}
    <div class="header">
      Create New Course
    </div>
    <div class="content">
      <div class="ui form">
        <div class="required field">
          <label>Name</label>
          {!! Form::text('name', '', ['placeholder' => "Course name"]) !!}
          <small>
            *This course will be created under the department of <strong>{{ $dept }}</strong>.
          </small>
        </div>
      </div>
    </div>
    <div class="actions">
      <div class="ui cancel button">Hold on</div>
      <button class="ui approve teal button">Create</button>
    </div>
  {!! Form::close() !!}

  {!! Form::open(['route' => 'course_update', 'class' => 'ui small update course modal']) !!}
    <div class="header">
      Update Course
    </div>
    <div class="content">
      <div class="ui form">
        <input type="hidden" name="id"></input>
        <div class="required field">
          <label>Name</label>
          {!! Form::text('name', '', ['placeholder' => "Course name"]) !!}
        </div>
      </div>
    </div>
    <div class="actions">
      <div class="ui cancel button">Hold on</div>
      <button class="ui approve teal button">Update</button>
    </div>
  {!! Form::close() !!}

  {!! Form::open(['route' => 'course_remove', 'class' => 'ui small remove course modal']) !!}
    <div class="header">
      Remove Course
    </div>
    <div class="content">
      <input type="hidden" name="id"></input>
      Are you sure you want to remove this course - <strong class="name"></strong> ?
    </div>
    <div class="actions">
      <div class="ui cancel button">Hold on</div>
      <button class="ui approve red button">Remove</button>
    </div>
  {!! Form::close() !!}
@stop