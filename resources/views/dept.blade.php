@extends('default')

@section('content')
  <div class="column">
    @include('partials.message')
    @include('partials.errors')
    <div class="ui basic clearing segment" style="padding: 0">
      <div class="ui left floated large header" style="margin-bottom: 0">
        <i class="building icon"></i>
        <div class="content">
          Department list
        </div>
      </div>
      @if (Sentinel::inRole('admin'))
        <div id="create-dept-btn" class="ui right floated teal icon labeled button">
          <i class="add icon"></i>
          Create new department
        </div>
      @endif
    </div>
    <div class="ui segment" style="padding: 0">
      <table class="ui padded table" style="border: none">
        <thead>
          <tr>
            <th>Name</th>
            <th class="center aligned">Email</th>
            <th class="one wide center aligned">Course(s)</th>
            <th class="center aligned">Created at</th>
            <th class="one wide"></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($depts as $dept)
            <tr>
              <td>
                {{ $dept }}
              </td>
              <td class="center aligned">
                {{ $dept->email or '-' }}
              </td>
              <td class="center aligned">
                {{ $dept->courses->count() }}
              </td>
              <td class="center aligned">
                {{ $dept->created_at }}
              </td>
              <td class="right aligned">
                <a href="{{ route('dept_detail', $dept->id) }}" class="ui icon button" data-content="Detail" data-variation="inverted">
                  <i class="book icon"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">
                <div class="ui center aligned basic padded segment">
                  <div class="ui huge disabled icon header">
                    <i class="info circle icon"></i>
                    <div class="content">
                      No department found
                      <div class="sub header">
                        Create new department ?
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

  {!! Form::open(['route' => 'dept_create', 'class' => 'ui create dept small modal']) !!}
    <div class="header">
      Create New Department
    </div>
    <div class="content">
      <div class="ui form">
        <div class="two fields">
          <div class="required field">
            <label>Name</label>
            {!! Form::text('name', '', ['placeholder' => "Department's name"]) !!}
          </div>
          <div class="field">
            <label>Email</label>
            {!! Form::email('email', '', ['placeholder' => "Department's email"]) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="actions">
      <div class="ui cancel button">Hold on</div>
      <button class="ui approve teal button">Create</button>
    </div>
  {!! Form::close() !!}
@stop