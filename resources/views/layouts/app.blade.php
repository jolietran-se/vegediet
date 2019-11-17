<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ url('public/js/app.js') }}" defer></script>
    <script src="{{ url('public/js/main.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ url('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/util.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/bower_components/components-font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    <div class="limiter" id="app">
		<main class="container-login100">
			<div class="wrap-login100 p-l-35 p-r-35 p-t-35 p-b-28">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
