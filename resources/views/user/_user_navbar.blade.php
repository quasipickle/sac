@if(Auth::user()->is_student())
  @if(Auth::User()->requested_new_role == false)
    @include('user._student_navbar')
  @endif
@else
  @include('user._professor_navbar')
@endif
<p class="navbar-text">
  <a href="{!! route('presentation.create') !!}">
    <span class="uofatext">
      <i class="fa fa-plus-square"></i>
      Presentation
    </span>
  </a>
</p>

<p class="navbar-text navbar-right">
  <a href="{!! url('/logout') !!}">
    <span class="uofatext">
      <i class="fa fa-sign-out"></i>
      Log out
    </span>
  </a>
</p>