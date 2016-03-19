<div class="ui top fixed inverted menu">
  <div class="uppercased header item">
    Recruit Mate Manager
  </div>
  <a href="{{ route('applicant') }}" class="item  {{ Request::is('applicant') ? 'active' : '' }}">
    <i class="user icon"></i>
    Applicant
  </a>
  <a href="{{ route('dept') }}" class="item  {{ Request::is('dept*') ? 'active' : '' }}">
    <i class="building icon"></i>
    Department
  </a>
  <a href="{{ route('import') }}" class="item  {{ Request::is('import') ? 'active' : '' }}">
    <i class="level down icon"></i>
    Import
  </a>
  <a href="{{ route('email') }}" class="item  {{ Request::is('email') ? 'active' : '' }}">
    <i class="mail icon"></i>
    Mail
  </a>
  <div class="right menu">
    <div class="borderless item">
      <i class="large olive android icon link"></i>
      <div class="ui flowing download android popup">
        <a href="{{ asset('assets/download/recruitmate_v8.apk') }}" class="ui yellow icon labeled button">
          <i class="download icon"></i>
          Download Recruit Mate Android App (.apk)
        </a>
      </div>
    </div>
    <div class="ui dropdown item">
      Hello, {{ Sentinel::getUser() }}
      @if (Sentinel::inRole('admin'))
        <div class="ui small blue horizontal compact label">
          Admin
        </div>
      @endif
      <i class="dropdown icon"></i>
      <div class="menu">
        <a href="{{ route('setting') }}" class="item">
          <i class="settings icon"></i>
          Setting
        </a>
        <a href="{{ route('logout') }}" class="item">
          <i class="sign out icon"></i>
          Logout
        </a>
      </div>
    </div>
  </div>
</div>