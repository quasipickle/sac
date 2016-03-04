<nav class="navbar navbar-default uofa">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img alt="Augustana" class="uofatext" >
      </a>
    </div>
      @if(Auth::check())
        @include('user._user_navbar')
      @else
        <p class="navbar-text navbar-right">
          <span class="uofatext">
            You are not signed in.
            <a class="uofatext" href="{!! url('/login') !!}">
              Login
            </a>
            or
            <a class="uofatext" href="{!! url('/register') !!}">
              Signup
            </a>
          </span>
        </p>
      @endif
  </div>
</nav>
