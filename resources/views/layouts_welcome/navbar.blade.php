<nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top shadow" id="mainNav">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ '/' }}">
            <img src="{{ asset('img/undraw_rocket.svg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Inventaris APP
          </a>
          @if (Route::currentRouteName() == 'login')
                {{-- kosong --}}
          @else
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <a class="nav-item" href="{{ 'login' }}"><button class="btn btn-warning">
                    <span class="fw-bold text-white" >Login</span>
                </button></a>
            </ul>
        </div>
          @endif
    </div>
</nav>
