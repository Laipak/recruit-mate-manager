@extends('default')

@section('content')
<div class="column">
  @include('message') 
  {!! Form::open(['route' => Route::getCurrentRoute()->getPath(), 'method' => 'GET', 'class' => 'ui padded stacked segment form']) !!}
  <div class="ui top free horizontal divider">
    Filter
  </div>
  <div class="two fields">
    <div class="field">
      <div id="dept-select" class="ui selection dropdown">
        <input type="hidden" name="department" value="{{ Input::get('department') }}">
        <i class="dropdown icon"></i>
        <span class="default text">Select a department</span>
        <div class="menu">
          @foreach (Config::get('hook.courses') as $department => $courses)
          <div class="item" data-value="{{ $department }}">
            {{ $department }}
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="field">
      <div id="course-select" class="ui fluid search selection dropdown">
        <input type="hidden" name="course" value="{{ Input::get('course') }}">
        <i class="dropdown icon"></i>
        <span class="default text">or select a course</span>
        <div class="menu">
          @foreach (Config::get('hook.courses') as $key => $courses)
          <div class="divider"></div>
          <div class="header">{{ $key }}</div>
          <div class="divider"></div>
          @foreach ($courses as $course)
          <div class="item" data-value="{{ $course }}">
            {{ $course }}
          </div>
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      {!! Form::select('is_exported', ['all' => 'All export status', 0 => 'Un-exported', 1 => 'Exported'], Input::has('is_exported') ? Input::get('is_exported') : 'All', ['class' => 'ui dropdown']) !!}  
    </div>
    <div class="field">
      {!! Form::select('is_emailed', ['all' => 'All email status', 0 => 'Un-emailed', 1 => 'Emailed'], Input::has('is_emailed') ? Input::get('is_emailed') : 'All', ['class' => 'ui dropdown']) !!}  
    </div>
  </div>
  <div class="field" style="overflow: hidden;">
    <button class="ui right floated small basic button">Filter</button>
    <a href="{{ route('export') }}" class="ui right floated small basic button">
      Reset
    </a>
  </div>
  {!! Form::close() !!}

  {!! Form::open(['id' => 'process-form', 'route' => 'post_process']) !!}
  <div class="ui padded stacked segment form">
    <input type="hidden" id="process-form-action" name="action"></input>
    <div class="field">
      <div class="ui icon input">
        <i class="file icon"></i>
        <input name="filename" type="text" placeholder="Export file name">
      </div>
    </div>
    <div class="three fields">
      <div class="field">
        <div id="export-all-button" class="ui fluid button">
          <div>
            Export all
          </div>
          <small>
            *Export all database applicant into a .csv file
          </small>
        </div>
      </div>
      <div class="field">
        <div id="export-selected-button" class="ui fluid button">
          <div class="text">
            Export selected
          </div>
          <small>
            *Export selected applicant into a .csv file
          </small>
        </div>
      </div>
      <div class="field">
        <div id="send-email-button" class="ui fluid button">
          <div class="text">
            Send email
          </div>
          <small>
            *Send email to selected applicant
          </small>
        </div>
      </div>
    </div>
  </div>
  <div class="ui padded raised segment">
    <table class="ui very basic padded striped celled table">
      <thead>
        <tr>
          <th class="one wide"></th>
          <th>Name</th>
          <th>Interested course(s)</th>
          <th class="center aligned">Emailed</th>
          <th class="center aligned">Exported</th>
          <th class="center aligned">
            <div id="master-checkbox" class="ui fitted checkbox">
              <input type="checkbox" checked>
            </div>
          </th>
        </tr>
      </thead>
      <tbody id="table-content">
        @forelse ($applicants as $applicant)
        <tr>
          <td class="center aligned">
            <i class="blue large unhide icon link caller" data-content="Detail" data-variation="inverted" data-item='{{ json_encode($applicant->toArray()) }}'></i>
          </td>
          <td>
            <i class="{{ $applicant->gender == 'M' ? 'male' : 'pink female' }} icon"></i>
            {{ $applicant->name }}
          </td>
          <td class="eight wide">
            <div class="ui bulleted list">
              <div class="item">
                {{ $applicant->course_of_interest_1 }}
              </div>
              @if ($applicant->course_of_interest_2 && $applicant->course_of_interest_2 != 'None')
              <div class="item">
                {{ $applicant->course_of_interest_2 }}
              </div>
              @endif
              @if ($applicant->course_of_interest_3 && $applicant->course_of_interest_3 != 'None')
              <div class="item">
                {{ $applicant->course_of_interest_3 }}
              </div>
              @endif
            </div>
          </td>
          <td class="center aligned">
            <i class="big {{ $applicant->is_emailed ? 'green checkmark' : 'red remove' }} icon"></i>
          </td>
          <td class="center aligned">
            <i class="big {{ $applicant->is_exported ? 'green checkmark' : 'red remove' }} icon"></i>
          </td>
          <td class="center aligned">
            <div class="ui child fitted checkbox">
              <input name="selected[]" type="checkbox" value="{{ $applicant->id }}" checked>
            </div>
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="6">
              <div class="ui center aligned basic padded segment">
                <div class="ui huge disabled icon header">
                  <i class="info circle icon"></i>
                  <div class="content">
                    No data found
                    <div class="sub header">
                      Change your filters ?
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
  {!! Form::close() !!}
</div>
<div class="ui small info modal">
  <div class="content">
    <div class="ui basic padded segment">
      <table id="info-table" class="ui celled table">
        <tbody>
          <tr>
            <td>Name</td>
            <td>
              <span class="name"></span>
              <span class="gender"></span>
            </td>
          </tr>
          <tr>
            <td>DOB</td>
            <td class="dob"></td>
          </tr>
          <tr>
            <td>NRIC/Fin/Passport</td>
            <td class="nric"></td>
          </tr>
          <tr>
            <td>Nationality</td>
            <td class="nationality"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td class="email"></td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td class="mobile"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td>
              <div class="addr1"></div>
              <div class="addr2"></div>
              <div class="addr3"></div>
            </td>
          </tr>
          <tr>
            <td>English Proficiency</td>
            <td class="ep"></td>
          </tr>
          <tr>
            <td>GPA</td>
            <td class="gpa"></td>
          </tr>
          <tr>
            <td>Course Type</td>
            <td class="type"></td>            
          </tr>
          <tr>
            <td>Expected Start Date</td>
            <td class="start"></td>
          </tr>
          <tr>
            <td>Interested Course(s)</td>
            <td>
              <ul class="ui coi list">
              </ul>
            </td>
          </tr>
          <tr>
            <td>Enquiry</td>
            <td class="enquiry"></td>
          </tr>
          <tr>
            <td>Exported ?</td>
            <td class="exported center aligned">
              <i class="inverted green circular checkmark icon"></i>
            </td>
          </tr>
          <tr>
            <td>Emailed ?</td>
            <td class="emailed center aligned">
              <i class="inverted red circular remove icon"></i>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="right aligned">
              Registered at 
              <strong>
                <span class="registered"></span>
              </strong>, on device 
              <strong>
                <span class="device"></span>
              </strong>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop