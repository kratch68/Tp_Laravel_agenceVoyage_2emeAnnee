<!doctype html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>@yield('titre')</title>

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/BonVoyage') }}">
                    Agence Voyage
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @if(Auth::user()->role=='admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/client') }}">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/voyage') }}">Voyage</a>
                        </li>
                    @elseif(Auth::user()->role=='client')
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Deconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    @if (session('message'))  
    <div class="alert alert-info">  
        <strong>  
        {{ session('message') }}  
        </strong>  
    </div>  
    @endif
    @if ($errors->any())  
    <div class="alert alert-danger">  
        <strong>  
        Oups. Nous n’avons pas pu enregistrer votre  
        demande pour la raison suivante :  
        </strong>  
        <ul class="list-unstyled">  
        @foreach ($errors->all() as $error)  
            <li>{{ $error }}</li>  
        @endforeach  
        </ul>  
    </div>  
    @endif  
    @yield('contenu')
    </body>
</html>