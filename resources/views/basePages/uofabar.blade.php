<nav class="navbar navbar-default uofa">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img alt="Augustana" class="uofatext" >
      </a>
    </div>
    <p class="navbar-text navbar-right">
      @if(Auth::check())
        <a class="btn btn-default" href="{!! url('/presentation/new') !!}">
            Add Presentation
        </a>

        <a class="btn btn-default" href="{!! url('/logout') !!}">
            Log out
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
