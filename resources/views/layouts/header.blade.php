  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
    <a class="navbar-brand" href="#">Vive tu Gran Canaria</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        @guest
            <li class="nav-item active">
                <a class="nav-link" href="#">Actividades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
        @else
            @if(Auth::user()->role === ('empresa'))
                            
            <li class="nav-item active">                                
                <a class="nav-link" href="#">Listado Actividades</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Listado Usuarios</a>
            </li>
            @endif
            @if(Auth::user()->role === ('administrador'))

            <li class="nav-item active">                                
                <a class="nav-link" href="#">Listado Usuarios</a>
            </li>
            @endif
            @if(Auth::user()->role === ('cliente'))
                <li class="nav-item active">
                    <a class="nav-link" href="#">Actividades</a>
                </li>
            @endif
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                         </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
    </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Busca alguna actividad" aria-label="Search">
        <button type="button" class="btn bg-info"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </nav>

