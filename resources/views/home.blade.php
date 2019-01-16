@extends('layouts.master')

@section('head')
    
    <script src="{{ asset('js/slide.js') }}"></script>
    <script src="{{ asset('js/toplist.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">

@endsection

@section('content')
    @if(!isset($search_dishes))
        <div class="slider-relative">
            <div class="slider-block">
                <div class="slider">
                    <ul class="items">
                        <li><img src="{{ config('asset.image_path.slide').'15.jpg' }}" alt=""></li>
                        <li><img src="{{ config('asset.image_path.slide').'14.jpg' }}" alt=""></li>
                        <li><img src="{{ config('asset.image_path.slide').'12.jpg' }}" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="content page1">
        <div class="container_12">
            <div class="grid_12">
                <h2>{{ trans('homepage.search') }}</h2>
                {!! Form::open([
                    'method' => 'POST', 
                    'route' => 'search',
                    'class' => 'search-container',
                    'role' => 'search',
                ]) !!}
                    {!! Form::text('q', '', [
                        'class' => 'search-bar', 
                        'id' => 'search-bar',
                        'placeholder' => trans('homepage.search_placeholder'),
                    ]) !!}
                    {!! Form::button('<i class="fa fa-search"></i>', [
                        'class' => 'search-icon',
                        'type' => 'submit',
                    ]) !!}
                {!! Form::close() !!}
                @if(isset($message))
                    <p style="color: red">{{$message}}</p>
                @endif
            </div>
            
            @if(isset($search_dishes) || isset($tag_count))
                @if(isset($search_dishes))
                <div class="grid_12">
                    <div class="car_wrap">
                        <h2>{{ trans('homepage.search_list') }}: {{ $q }}</h2>
                        <ul class="carousel1">
                        @foreach ($search_dishes as $dish)
                            <li>
                                <div>
                                    <a href="{{ route('dishes.show', $dish->slug) }}">
                                        @if(isset($dish->picture))
                                            <img src="{{ config('asset.image_path.dish').$dish->picture }}" alt="">
                                        @else
                                            <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                        @endif
                                    </a>
                                    <div class="col1 upp">
                                        <a href="{{ route('dishes.show', $dish->slug) }}">
                                            <strong>{{ $dish->name }}</strong>
                                        </a>
                                        <strong class="pull-right">{{ $dish->like_number }} <i class="fa fa-heart"></i></strong>
                                    </div>
                                    <span>{{ str_limit($dish->description, 100) }}</span>
                                    <div>
                                        <strong>{{ $dish->created_at }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if(isset($search_tag))
                    <div class="grid_12 categories">
                        <h2>{{ trans('homepage.tag_list') }}: {{ $q }}</h2>
                        <div class="car_wrap">
                            <ul class="cate-list">
                                @foreach ($search_tag as $category)
                                    <li><a href="{{ route('cate.show', $category->slug) }}" class="category">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @else
                <div class="grid_12 categories">
                    @foreach ($categories as $category)
                        <a href="{{ route('cate.show', $category->slug) }}" class="category">{{ $category->name }}</a>
                    @endforeach
                </div>
                <div class="clear"></div>
                <div class="grid_12">
                    <div class="hor_separator"></div>
                </div>

                <div class="grid_12">
                    <div class="car_wrap">
                        <h2>{{ trans('homepage.new') }}</h2>
                        <a href="#" class="prev new-prev"></a><a href="#" class="next new-next"></a>
                        <ul class="carousel1 new-list">
                        @foreach ($dishes as $dish)
                            <li>
                                <div>
                                    <a href="{{ route('dishes.show', $dish->slug) }}">
                                        @if(isset($dish->picture))
                                            <img src="{{ config('asset.image_path.dish').$dish->picture }}" alt="">
                                        @else
                                            <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                        @endif
                                    </a>
                                    <div class="col1 upp">
                                        <a href="{{ route('dishes.show', $dish->slug) }}">
                                            <strong>{{ $dish->name }}</strong>
                                        </a>
                                        <strong class="pull-right">{{ $dish->like_number }} <i class="fa fa-heart"></i></strong>
                                    </div>
                                    <span>{{ str_limit($dish->description, 100) }}</span>
                                    <div>
                                        <strong>{{ $dish->created_at }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="grid_12">
                    <div class="hor_separator"></div>
                </div>
                
                <div class="grid_12">
                    <div class="car_wrap">
                        <h2>{{ trans('homepage.top') }}</h2>
                        <a href="#" class="prev top-prev"></a><a href="#" class="next top-next"></a>
                        <ul class="carousel1 top-list">
                        @foreach ($top_dishes as $top_dish)
                            <li>
                                <div>
                                    <a href="{{ route('dishes.show', $top_dish->slug) }}">
                                        @if(isset($top_dish->picture))
                                            <img src="{{ config('asset.image_path.dish').$top_dish->picture }}" alt="">
                                        @else
                                            <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                        @endif
                                    </a>
                                    <div class="col1 upp">
                                        <a href="{{ route('dishes.show', $top_dish->slug) }}">
                                            <strong>{{ $top_dish->name }}</strong>
                                        </a>
                                        <strong class="pull-right">{{ $top_dish->like_number }} <i class="fa fa-heart"></i></strong>
                                    </div>
                                    <span>{{ str_limit($top_dish->description, 100) }}</span>
                                    <div>
                                        <strong>{{ $top_dish->created_at }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="grid_12">
                    <div class="hor_separator"></div>
                </div>
                
                <div class="grid_12">
                    <div class="car_wrap">
                        <h2>{{ trans('homepage.dish_list') }}</h2>
                        <div class="infinite-scroll">
                            <ul class="carousel1">
                            @foreach ($dishes as $home_view_dish)
                                <li>
                                    <div>
                                        <a href="{{ route('dishes.show', $home_view_dish->slug) }}">
                                            @if(isset($home_view_dish->picture))
                                                <img src="{{ config('asset.image_path.dish').$home_view_dish->picture }}" alt="">
                                            @else
                                                <img src="{{ config('asset.image_path.dish').'dish_none.png' }}" alt="">
                                            @endif
                                        </a>
                                        <div class="col1 upp">
                                            <a href="{{ route('dishes.show', $home_view_dish->slug) }}"><strong>{{ $home_view_dish->name }}</strong></a>
                                            <strong class="pull-right">{{ $home_view_dish->like_number }} <i class="fa fa-heart"></i></strong>
                                        </div>
                                        <span>{{ str_limit($home_view_dish->description, 100) }}</span>
                                        <div>
                                            <strong>{{ $home_view_dish->created_at }}</strong>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div><a href="{{ route('dishes.index') }}" class="btn btn-success"><strong>{{ trans('homepage.viewmore') }}</strong></a></div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('foot')
@endsection
