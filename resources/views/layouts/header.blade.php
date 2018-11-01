<header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a></h1>
        <div class="menu_block">
            <nav>
                <ul class="sf-menu">
                    <li><a href="{{ route('home') }}">{{ trans('headertext.home') }}</a></li>
                    <li><a  href="#">{{ trans('headertext.aboutus') }}</a></li>
                    <li><a  href="#">{{ trans('headertext.contact') }}</a></li>
                    @if (Route::has('login'))
                    @auth
                        <li>
                            <a>
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ trans('login.logout') }}
                                    </a>
                                    {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form']) !!}
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <a href="#">{{ trans('headertext.your_profile') }}</a>
                                </li>
                            </ul>
                        </li>
                        @else
                            <li><a href="{{ route('login') }}">{{ trans('login.login') }}</a></li>
                            <li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">{{ trans('login.register') }}</a>
                                @endif
                            </li>
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
      </div>
    </div>
</header>
