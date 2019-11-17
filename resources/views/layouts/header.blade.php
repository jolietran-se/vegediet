<header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="{{ route('home') }}"><img src="{{ url('public/images/logo.png') }}" alt="Logo"></a></h1>
        <div class="menu_block">
            <nav>
                <ul class="sf-menu">
                    <li><a  href="{{ route('home') }}">{{ trans('headertext.home') }}</a></li>
                    <li><a  href="{{ route('dishes.index') }}">{{ trans('headertext.all_dishes') }}</a></li>
                    <li><a  href="#">{{ trans('headertext.all_ingredients') }}</a></li>
                    <li><a  href="#">{{ trans('headertext.contact') }}</a></li>
                    @if (Route::has('login'))
                        @auth
                        <li>
                            <a>
                                @if(isset(Auth::user()->avatar))
                                    <img src="{{ config('asset.image_path.auth_avatar').Auth::user()->avatar }}" class="img-circle">
                                @else
                                    <img src="{{ config('asset.image_path.auth_avatar').'avatar_cat.png' }}" class="img-circle">
                                @endif
                                <span class="caret">{{ Auth::user()->name }}</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <span class="fa fa-sign-out pull-left"></span>{{ trans('login.logout') }}
                                    </a>
                                    {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form']) !!}
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <a href="{{ route('users.profile', Auth::user()->slug) }}"><span class="fa fa-user pull-left"></span>{{ trans('headertext.your_profile') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('dishes.create') }}"><span class="fa fa-apple pull-left"></span>{{ trans('headertext.add_dish') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('users.profile', Auth::user()->slug) }}"><span class="fa fa-heart pull-left"></span>{{ trans('headertext.your_favorites') }}</a>
                                </li>
<!-- 
                                <li>
                                    <a href="{{ route('dishes.index') }}"><span class="fa fa-heart pull-left"></span>{{ trans('headertext.search') }}</a>
                                </li> -->
                            </ul>
                        </li>
                        @else
                            <li><a href="{{ route('login') }}">{{ trans('login.login') }}</a></li>
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
      </div>
    </div>
</header>
