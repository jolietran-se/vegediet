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
        <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}">

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

            <div class = "container_12">
                <div class="bottom_block">
                    <div class="grid_6">
                        <h3>{{ trans('homepage.follow_us') }}</h3>
                        <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
                        <nav>
                        <ul>
                            <li class="current"><a href="#">{{ trans('headertext.home') }}</a></li>
                            <li><a href="#">{{ trans('headertext.aboutus') }}</a></li>
                            <li><a href="#">{{ trans('headertext.contact') }}</a></li>
                        </ul>
                        </nav>
                    </div>
                    <div class="grid_6">
                    <h3>{{ trans('homepage.feedback') }}</h3>
                    <p class="col1">{{ trans('homepage.feedback_encourage') }}</p>

                    @if (Route::has('feedbacks.store'))
                        {!! Form::open([
                            'method' => 'POST', 
                            'route' => 'feedbacks.store', 
                            'class' => 'newsletter'
                        ]) !!}
                        <div class="success">{{ trans('homepage.feedback_success') }}</div>
                            {!! Form::textarea('feedback', null, [
                                'id' => 'feedback', 
                                'rows' => 5, 
                                'cols' => 73,
                            ]) !!}
                            {!! Form::button(trans('homepage.feedback_sent'), [
                                'class' => 'btn-submit-feedback', 
                                'type' => 'submit',
                            ]) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open([
                            'method' => 'POST', 
                            'route' => 'feedbacks.store', 
                            'class' => 'newsletter'
                        ]) !!}
                            {!! Form::textarea('feedback', null, [
                                'id' => 'feedback', 
                                'rows' => 5, 
                                'cols' => 73,
                            ]) !!}
                            {!! Form::button(trans('homepage.feedback_sent'), [
                                'class' => 'btn-submit-feedback', 
                                'type' => 'submit',
                            ]) !!}
                        {!! Form::close() !!}
                    @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')

        @yield('foot')
    </body>
</html>
