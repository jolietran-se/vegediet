@extends('layouts.master')

@section('head')
    
    <link rel="stylesheet" href="{{ url('public/css/search.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/dish_detail.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/categories.css') }}">

@endsection

@section('content')
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
                <h2>{{ trans('category.dish_tag') }}: {{ $category->name }}</h2>
                    <div class="infinite-scroll">
                        <ul class="carousel1">
                        @foreach ($dishes as $dish)
                            <li>
                                <div>
                                    <a href="{{ route('dishes.show', $dish->slug) }}">
                                        @if(isset($dish->picture))
                                            <img src="{{ config('asset.category_path.dish').$dish->picture }}" alt="">
                                        @else
                                            <img src="{{ config('asset.category_path.dish').'dish_none.png' }}" alt="">
                                        @endif
                                    </a>
                                    <div class="col1 upp">
                                        <a href="{{ route('dishes.show', $dish->slug) }}"><strong>{{ $dish->name }}</strong></a>
                                        <strong class="pull-right">{{ $dish->like_number }} <i class="fa fa-heart"></i></strong>
                                    </div>
                                    <span>{{ str_limit($dish->description,100) }}</span>
                                    <div>
                                        <strong>{{ $dish->created_at }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    </ul>
                </div>
            </div>
            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>
            <div class="clear"></div>
            <div class="grid_12 categories">
                <div class="car_wrap">
                    <h2>{{ trans('category.categories') }}</h2>
                    <ul class="cate-list">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('cate.show', $category->slug) }}" class="category">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
@endsection
