<div class="ui top fixed three item icon labeled inverted menu">
  <a href="{{ route('import') }}" class="item  {{ Request::is('import') ? 'active' : '' }}">
    <i class="level down icon"></i>
    Import
  </a>
  <a href="{{ route('export') }}" class="item  {{ Request::is('export') ? 'active' : '' }}">
    <i class="level up icon"></i>
    Export
  </a>
  <a href="{{ route('email') }}" class="item  {{ Request::is('email') ? 'active' : '' }}">
    <i class="mail icon"></i>
    Mail
  </a>
</div>