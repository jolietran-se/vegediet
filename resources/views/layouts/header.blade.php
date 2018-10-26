<header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="{{ url('/') }}"><img src="#" alt="Logo"></a></h1>
        <div class="menu_block">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ trans('login.vigediet') }}
                    </a>
                    {!! Form::button('<span class="navbar-toggler-icon"></span>', [
                        'class' => 'navbar-toggler', 
                        'data-toogle' => 'collapse', 
                        'data-target' => '#navbarSupportedContent', 
                        'aria-controls' => 'navbarSupportedContent', 
                        'aria-expanded' => 'false', 
                        'aria-label' => "{{ trans('login.toggle') }}",
                    ]) !!}

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ trans('headertext.aboutus') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ trans('headertext.contact') }}</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ trans('login.login') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ trans('login.register') }}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ trans('login.logout') }}
                                        </a>

                                        {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
</header>
