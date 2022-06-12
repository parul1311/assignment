<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/logo.jpg') }}" class="logo-image" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse justify-content-end collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('details.index') }}">Panel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/login') }}">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/register') }}">Sign Up</a>
        </li>
        @endauth
      </ul>
    </div>
  </nav>