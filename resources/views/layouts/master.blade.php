<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

    <title>{{ trans('login.vegediet') }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    
    <script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-migrate/jquery-migrate.js') }}"></script> 
    <script src="{{ asset('bower_components/jquery.easing/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-carouFredSel/jquery.carouFredSel-6.2.1-packed.js') }}"></script>

    <script src="{{ asset('js/superfish.js') }}"></script>
    <script src="{{ asset('js/sForm.js') }}"></script>
    <script src="{{ asset('js/tms-0.4.1.js') }}"></script>
    
    @yield('head')
  </head>
  <body>
    @include('layouts.header')
    <div class="main">
        @yield('content');
    </div>
    @include('layouts.footer')

    @yield('foot')
  </body>
</html>
