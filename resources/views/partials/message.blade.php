@if (Session::has('error'))
    <div class="ui error message">
    <i class="remove circle close icon"></i>
    <div class="content">
      {{ Session::get('error') }}
    </div>
  </div>
@endif
@if (Session::has('success'))
  <div class="ui success message">
    <i class="close icon"></i>
    <div class="content">
      {{ Session::get('success') }}
    </div>
  </div>
@endif
