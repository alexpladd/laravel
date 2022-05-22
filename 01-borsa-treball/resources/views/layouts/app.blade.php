<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.svg') }}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Institut CodeJam - Borsa de treball
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sessió') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registre') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->coordinator == 0)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Inici</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }} {{Auth::user()->last_name}}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('fitxa') }}" class="dropdown-item">
                                            La Meva Fitxa
                                        </a>

                                        <a target="_blank" href="{{ route('fitxa.curriculum', Auth::user()->url_file) }}" class="dropdown-item">
                                            El Meu Currículum Vítae
                                        </a>

                                        <a target="_blank" href="{{ route('fitxa.download', Auth::user()->url_file) }}" class="dropdown-item">
                                            Descarregar Currículum Vítae
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Tancar Sessió') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Inici</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('companies') }}">Empreses</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('studies') }}">Estudis</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('offers') }}">Ofertes</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('graduates') }}">Titulats</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }} {{Auth::user()->last_name}}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('fitxa') }}" class="dropdown-item">
                                            La Meva Fitxa
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Tancar Sessió') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
