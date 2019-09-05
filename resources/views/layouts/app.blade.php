<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        {{-- app para llamar los componente vuejs sin problemas --}}
        <div id="app">
            @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{-- Menu de navegación principal LLama componente VUEJS solo si esta Logueado con vue Router--}}
            {{-- @include('layouts.navbars.sidebar') --}}
            <navigation></navigation>

            <div class="main-content">
                {{-- se deja el nabvar cuando es tamaño pantalla grande --}}
                @include('layouts.navbars.navbar')
                {{-- Se llaman las cards de los componentes vuejs --}}

                {{-- AQUI SE LLAMARA EL CUERPO DE LA TEMPLATEADMIN --}}
                <router-view></router-view>
                <footeradmin></footeradmin>
            </div>
            @endauth

            {{-- Si no esta logueado --}}
            @guest()
            <div class="main-content">
                @include('layouts.navbars.navbar')
                {{-- se llama lo que viene de welcome, un componente VUEJS --}}
                @yield('content')
            </div>
                {{-- se llama el footer de usuario no logueado--}}
                @include('layouts.footers.guest')
            @endguest
        </div>
    </body>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')

    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    <script src="js/app.js"></script>
</html>
