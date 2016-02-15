<nav class="navbar navbar-default uofa">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img alt="Augustana" class="uofatext" >
      </a>
    </div>
    <p class="navbar-text navbar-right">
      @if(Auth::check())
        <a href="{!! url('/logout') !!}">
          <span class="uofatext">
            Log out
          </span>
        </a>
      @else
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
      @endif
    </p>
  </div>
</nav>
