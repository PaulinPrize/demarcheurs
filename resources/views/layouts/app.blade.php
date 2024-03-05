<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('https://www.demarcheurs.com') }}" style="font-weight:bold">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon "></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-warning" href="{{ route('logements.create') }}" role="button" style="color:white;">Publier un logement</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('user/') }}">{{ __('Tableau de bord') }}</a>
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
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-top: 56px">
            @yield('content')
        </main>

        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">Démarcheurs</p>
                        <p>Démarcheurs est une plateforme de mise en relation entre des agents immobiliers et des personnes à la recherche de logements.</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">A propos de nous</p>
                        <ul>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Qui sommes-nous ?</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Nous rejoindre</a></li>
                        </ul> 
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">Mentions légales</p>
                        <ul>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Conditions générales</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Données personnelles</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Cookies</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">Assistance</p>
                        <ul>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Support</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage"></a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage"></a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage"></a></li>
                        </ul> 
                    </div>
                </div>
                <hr></hr>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        Copyright © 2020 Démarcheurs. Tous droits réservés. Acte signé et revendiqué <a href="https://www.linkedin.com/in/paulin-arnold-priso-priso">Paulin Priso</a> & <a href="">Aurelien Mbend</a><br/>
                    </div>
                </div>
            </div>
        </footer>
        
    </div>
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    @yield('script')
</body>
</html>
