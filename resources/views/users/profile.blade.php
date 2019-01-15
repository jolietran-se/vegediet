@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">

@endsection

@section('content')

<div class="content page">
    <div class="container_12">
        <!-- DETAIL -->
        <div class= "grid_12">
            <!-- Notice -->
            @if( Session::has('create_dish') )
                <div class="alert alert-success">
                    {{ Session::get('create_dish') }}
                </div>
            @endif
            <!-- Detail Dish -->
            <div id="pageContent">
                <section class="content offset-top-0">
                    <div class="container">
                        <div class="row product-info-outer">
                            <div class="grid_12">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 hidden-xs">
                                        <div class="product-main-image">
                                            <div class="product-main-image__item">
                                            @if(isset($user->avatar))
                                                <img class="product-zoom" src="{{ config('asset.image_path.auth_avatar').$user->avatar }}" data-zoom-image="{{ config('asset.image_path.auth_avatar').$user->avatar }}" alt="" /></div>
                                            @else
                                                <img class="product-zoom" src="{{ config('asset.image_path.auth_avatar').'avatar_cat.png' }}" data-zoom-image="{{ config('asset.image_path.auth_avatar').'avatar_cat.png' }}" alt="" /></div>
                                            @endif
										    <div class="product-main-image__zoom"></div>
                                        </div>
                                    </div>
                                    <div class="product-info col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                        <div class="product-info__title">
                                            <h2>{{ $user->name }}</h2>
                                        </div>
                                        <div class="product-info__review">
                                            <div>
                                                <p>{{ trans('user.email') }}: {{ $user->email }}</p>
                                                <p>{{ trans('user.phone') }}: {{ $user->phone }}</p>
                                                <p>{{ $user->name}} {{ trans('user.your_dish') }}: {{ $dish_count }}</p>
                                                <p>{{ $user->name}} {{ trans('user.your_favorite') }}: {{ $favorites_count }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
                                        <li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">{{ $user->name}} {{ trans('user.your_favorite') }}</a></li>
                                        <li class=""><a href="#Tab2"  role="tab" data-toggle="tab" class="text-uppercase">{{ $user->name}} {{ trans('user.your_dish') }}</a></li>
                                    </ul>
                                    <!-- Nav tabs Ingredient -->
                                    <div class="tab-content tab-content--ys nav-stacked">
                                        <div role="tabpanel" class="tab-pane active" id="Tab1">
                                            <div class="divider divider--md"></div>
                                            @if($favorites_count != 0)
                                                <ul class="carousel1">
                                                @foreach ($dishes as $key => $dish_favorites)
                                                    @foreach($dish_favorites as $dish)
                                                        <li>
                                                            <div>
                                                                <a href="{{ route('dishes.show', $dish->slug) }}">
                                                                    @if(isset($dish->picture))
                                                                        <img src="{{ config('asset.profile_path.dish').$dish->picture }}" alt="">
                                                                    @else
                                                                        <img src="{{ config('asset.profile_path.dish').'dish_none.png' }}" alt="">
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
                                                @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="Tab2">
                                            <div class="divider divider--md"></div>
                                            @if($dish_count != 0)
                                                <ul class="carousel1">
                                                @foreach ($your_dishes as $dish)
                                                    <li>
                                                        <div>
                                                            <a href="{{ route('dishes.show', $dish->slug) }}">
                                                                @if(isset($dish->picture))
                                                                    <img src="{{ config('asset.profile_path.dish').$dish->picture }}" alt="">
                                                                @else
                                                                    <img src="{{ config('asset.profile_path.dish').'dish_none.png' }}" alt="">
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
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection

@section('foot')
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Specific Page External Plugins -->
    <script src="{{ asset('bower_components/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('bower_components/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('bower_components/elevatezoom3/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-colorbox/jquery.colorbox-min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('js/dish_detail.js') }}"></script>
    <!-- SweetAlert -->
    
    <!-- Delete dish with SweetAlert2 -->

@endsection
