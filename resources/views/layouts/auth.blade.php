<!doctype html>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@900&display=swap" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<!-- *************todo: fix height footer and main **********-->
<body>
    <div id="app">

        <header class="p-0 navbar navbar-expand-md">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand d-flex align-items-center p-0" href="{{ url('/') }}">
                    <div class="logo">
                        <img class="logo-img" src="/images/logo-no-background.png" alt="boolbnb">
                    </div>
                    
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.stats.index') }}" class="nav-link">{{ __('Stats') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.apartments.index') }}"
                                    class="nav-link">{{ __('Apartments') }}</a>
                            </li>


                            {{-- <li class="nav-item">
                                    <a href="{{route('admin.services.index')}}" class="nav-link">{{__('Services')}}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.tags.index')}}" class="nav-link">{{__('Tags')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.plans.index')}}" class="nav-link">{{__('Plans')}}</a>
                        </li> --}}

                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        </header>
        <main class="main">
            @yield('content')
        </main>

        <footer>
            <div class="container d-flex justify-content-between align-items-center p-5">
                <div class="footer-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="social d-flex">
                    <a href="#">{{-- instagram --}}
                        <div class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37px" height="37px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z">
                            </path>
                        </svg>
                        </div>
                    </a>
                    <a href="#"> {{-- tiktok --}}
                        <div class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37px" height="37px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M16.6 5.82s.51.5 0 0A4.278 4.278 0 0 1 15.54 3h-3.09v12.4a2.592 2.592 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48z">
                            </path>
                        </svg>
                        </div>
                    </a>

                    <a href="#">{{-- twitter --}}
                        <div class="social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="37px" height="37px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z">
                                </path>
                            </svg>
                        </div>

                    </a>
                    <a href="#">{{-- fb --}}
                        <div class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37px" height="37px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z">
                            </path>
                        </svg>
                        </div>
                    </a>
                </div>
            </div>

            </div>
        </footer>
    </div>
</body>

</html>

<style>
    body {
        background-color: #EAEAEA;
        color: #EAEAEA;

        .navbar {
            border-bottom: 0.125rem solid var(--custom-black);

            .logo {
                color: var(--custom-red);
                cursor: pointer;
                .logo-img{
                    height: 60px;
                    margin: 10px 0;
                }

            }
        }
    }

    footer {
        background-color: var(--custom-black);
/*         height: 135px; */  /* todo: fix height footer and main */
        color: $custom-white;



        .footer-text {
            font-size: 1.25rem;
        }

        .social-icon {
            color: var(--custom-white);
            padding: 8px;

            &:hover {
                color: var(--custom-red);

            }
        }
    }
</style>
