@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/slick-carousel/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/magnific-popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">

@endsection

@section('content')
<div class="content page">
    <div class="container_12">
        <!-- DETAIL -->
        <div class= "grid_12">
            <!-- Home -->
            <div class="breadcrumbs">
                <div class="container">
                    <ol class="breadcrumb breadcrumb--ys pull-left">
                        <li class="home-link"><a href="{{ route('home') }}" class="fa fa-home"></a></li>
                        <li><a href="{{ route('home') }}">{{ trans('headertext.home') }}</a></li>
                        <li class="active">{{ $dish->name }}</li>
                    </ol>
                </div>
            </div>

            <!-- Detail Dish -->
            <div id="pageContent">
                <section class="content offset-top-0">
                    <div class="container">
                        <div class="row product-info-outer">
                            <div class="grid_12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 hidden-xs">
                                        <div class="product-main-image">
                                            <div class="product-main-image__item"><img class="product-zoom" src="{{ config('asset.image_path.dish_detail').$dish->picture }}" data-zoom-image="{{ config('asset.image_path.dish_detail').$dish->picture }}" alt="" /></div>
                                            <div class="product-main-image__zoom"></div>
                                        </div>
                                        <ul class="product-link">
                                            <li class="text-right"><a href="#"><span class="fa fa-heart tooltip-link"></span><span class="text">{{ trans('dish.add_wishlist') }}</span></a></li>
                                            <li class="text-left"><a href="#"><span class="fa fa-print tooltip-link"></span><span class="text">{{ trans('dish.print') }}</span></a></li>
                                            <li class="text-left"><a href="#"><span class="fa fa-share-square tooltip-link"></span><span class="text">{{ trans('dish.share') }}</span></a></li>
                                            <li class="text-left"><a href="{{ route('dishes.create') }}"><span class="fa fa-plus-circle tooltip-link"></span><span class="text">{{ trans('dish.add') }}</span></a></li>
                                            <li class="text-left"><a href="{{ route('dishes.edit', $dish->id) }}"><span class="fa fa-edit tooltip-link"></span><span class="text">{{ trans('dish.edit') }}</span></a></li>
                                            <li class="text-left"><a href="{{ route('dishes.destroy', $dish->id) }}"><span class="fa fa-trash tooltip-link"></span><span class="text">{{ trans('dish.destroy') }}</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product-info col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="product-info__title">
                                            <h2>{{ $dish->name }}</h2>
                                        </div>
                                        <div class="product-info__review">
                                            <div class="rating2">
                                                <a>{{ $dish->like_number }} <span class="fa fa-heart rating-text"></span></a>
                                            </div>

                                        </div>
                                        <div class="divider divider--xs product-info__divider hidden-xs"></div>
                                        <div class="product-info__description hidden-xs">
                                            <div class="product-info__description__brand"><img src="{{ config('asset.image_path.owner_avatar').$dish->user->avatar }}" class="avatar_chef" alt=""/></div>
                                            <div class="product-info__description__text">
                                                <a href="#">{{ trans('dish.repice') }}: <strong class="color">{{ $dish->user->name }}</strong></a>
                                                <div class="divider divider--xs product-info__divider hidden-xs"></div>
                                                "{{ $dish->description }}"
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="content">
                                    <!-- Nav tabs Ingredient -->
                                    <ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
                                        <li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">{{ trans('dish.ingredient') }}</a></li>
                                    </ul>
                                    <div class="tab-content tab-content--ys nav-stacked">
                                        <div role="tabpanel" class="tab-pane active" id="Tab1">
                                            <div class="divider divider--md"></div>
                                            <!-- Ingredients -->
                                            <ul>
                                            @foreach ($dish->ingredients as $ingredient)
                                                <li><span class="fa fa-check"></span> {{ $ingredient->name }} : {{ $ingredient->pivot->weight }} {{ trans('dish.gam') }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Cooking Step -->
                                    <ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
                                        <li class="active"><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">{{ trans('dish.direction') }}</a></li>
                                    </ul>
                                    <div class="tab-content tab-content--ys nav-stacked">
                                        <div role="tabpanel" class="tab-pane active" id="Tab2">
                                            <h5><strong class="color text-uppercase">{{ trans('dish.repice') }}</strong></h5>
                                            <div class="divider divider--xs"></div>
                                            <p>{{ $dish->description}}</p>
                                            <ul>
                                            @foreach ($dish->cookingsteps as $step)
                                                <li><span class="fa fa-check"></span> {{ $step->step}}</li>
                                            @endforeach
                                            </ul>

                                        </div>
                                    </div>

                                    <!-- Ntriion Facts -->
                                    <ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
                                        <li class="active"><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase">{{ trans('dish.nutrition_facts') }}</a></li>
                                    </ul>
                                    <div class="tab-content tab-content--ys nav-stacked">
                                        <div role="tabpanel" class="tab-pane active" id="Tab3">
                                            <h5><strong class="color text-uppercase">{{ trans('dish.nutrition_info') }}: {{ $dish->name }}</strong></h5>
                                            <div class="divider divider--xs"></div>
                                            <ul>
                                                <li><span class="fa fa-check"></span> {{ trans('dish.farina') }}: {{ $dish->farina_amount }} {{ trans('dish.gam') }}</li>
                                                <li><span class="fa fa-check"></span> {{ trans('dish.protein') }}: {{ $dish->protein_amount }} {{ trans('dish.gam') }}</li>
                                                <li><span class="fa fa-check"></span> {{ trans('dish.lipid') }}: {{ $dish->lipid_amount }} {{ trans('dish.gam') }}</li>
                                                <li><span class="fa fa-check"></span> {{ trans('dish.calories') }}: {{ $dish->calories_amount }} {{ trans('dish.calo') }}</li>
                                            </ul>
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
    <!-- Custom -->
    <script src="{{ asset('js/dish_detail.js') }}"></script>
@endsection
