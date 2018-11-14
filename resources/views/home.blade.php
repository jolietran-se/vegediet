@extends('layouts.master')

@section('head')
  <script src="{{ asset('js/slide.js') }}"></script>
  <script src="{{ asset('js/toplist.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}">

@endsection

@section('content')
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
    <div class="content page1">
        <div class="container_12">
            <div class="grid_12">
                <h2>{{ trans('homepage.search') }}</h2>
                {!! Form::open([
                    'method' => 'GET', 
                    'class' => 'search-container',
                ]) !!}
                    {!! Form::text('search', '', [
                        'class' => 'search-bar', 
                        'id' => 'search-bar',
                        'placeholder' => trans('homepage.search_placeholder'),
                    ]) !!}
                    {!! Form::button('<i class="fa fa-search"></i>', [
                        'class' => 'search-icon',
                        'type' => 'submit',
                    ]) !!}
                {!! Form::close() !!}
            </div>

            <div class="clear"></div>

            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>

            <div class="grid_12">
                <div class="car_wrap">
                    <h2>{{ trans('homepage.dish_list') }}</h2>
                    <ul class="carousel1">
                    @foreach ($dishes as $home_view_dish)
                        <li>
                            <div>
                                <a href="{{ route('dishes.show', $home_view_dish->id) }}"><img src="{{ config('asset.image_path.dish').$home_view_dish->picture }}" alt=""></a>
                                <div class="col1 upp">
                                    <a href="{{ route('dishes.show', $home_view_dish->id) }}"><strong>{{ $home_view_dish->name }}</strong></a>
                                    <strong class="pull-right">{{ $home_view_dish->like_number }} <i class="fa fa-heart"></i></strong>
                                </div>
                                <span>{{ $home_view_dish->description }}</span>
                                <div>
                                    <strong>{{ $home_view_dish->created_at }}</strong>
                                </div>                
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div><strong><a href="#">{{ trans('homepage.viewmore') }}</a></strong></div>
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
                    @foreach ($dish_top as $home_dish_top)
                        <li>
                            <div>
                                <a href="{{ route('dishes.show', $home_dish_top->id) }}"><img src="{{ config('asset.image_path.dish').$home_dish_top->picture }}" alt=""></a>
                                <div class="col1 upp">
                                    <a href="{{ route('dishes.show', $home_dish_top->id) }}"><strong>{{ $home_dish_top->name }}</strong></a>
                                    <strong class="pull-right">{{ $home_dish_top->like_number }} <i class="fa fa-heart"></i></strong>
                                </div>
                                <span>{{ $home_dish_top->description }}</span>
                                <div>
                                    <strong>{{ $home_dish_top->created_at }}</strong>
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
                    <h2>{{ trans('homepage.new') }}</h2>
                    <a href="#" class="prev new-prev"></a><a href="#" class="next new-next"></a>
                    <ul class="carousel1 new-list">
                    @foreach ($dish_new as $home_dish_new)
                        <li>
                            <div>
                                <a href="{{ route('dishes.show', $home_dish_new->id) }}"><img src="{{ config('asset.image_path.dish').$home_dish_new->picture }}" alt=""></a>
                                <div class="col1 upp">
                                    <a href="{{ route('dishes.show', $home_dish_new->id) }}"><strong>{{ $home_dish_new->name }}</strong></a>
                                    <strong class="pull-right">{{ $home_dish_new->like_number }} <i class="fa fa-heart"></i></strong>
                                </div>
                                <span>{{ $home_dish_new->description }}</span>
                                <div>
                                    <strong>{{ $home_dish_new->created_at }}</strong>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
