@if (count($errors))
  <div class="ui error message">
    <i class="remove circle close icon"></i>
    <div class="header">
      There was some errors with your submission
    </div>
    <ul class="list">
      @foreach ($errors->all('<li>:message</li>') as $message)
        {!! $message !!}
      @endforeach
    </ul>
  </div>
@endif
