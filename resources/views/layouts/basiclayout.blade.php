<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ViveTuGranCanaria</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Styles -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' 
        integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tablestyle.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a class="navbar-brand" href="{{ route('indexactivities') }}">ViveTuGranCanaria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                @guest        
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{ route('indexactivities') }}">Actividades</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif 
                @else
                    @if(Auth::user()->role === ('empresa'))
                        @php($companyid=Auth::user()->id)
                            <li class="nav-item active">                                
                                <a class="nav-link" href="{{ route('indexactivities') }}">Listado Actividades</a>
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
                            <a class="nav-link" href="{{ route('indexactivities') }}">Actividades</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('indextickets') }}">Tickets</a>
                        </li>
                    @endif
                    <li class="nav-item active">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Busca alguna actividad" aria-label="Search">
                <button type="button" class="btn bg-info"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>

    <section>
        @yield('infosection')
    </section>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="mini-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright-text">
                                <p>© 2020
                                    <b>ViveTuGranCanaria</b>. Todos los derechos reservados. Creado por
                                    <b>MdaCompany | Grupo02</b>
                                </p>
                            </div>                
                            <div class="go_top">
                                <span class="icon-arrow-up"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
