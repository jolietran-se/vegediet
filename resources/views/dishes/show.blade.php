@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/slick-carousel/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/magnific-popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/sweetalert2/dist/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">

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
            @if( Session::has('update_dish') )
                <div class="alert alert-success">
                    {{ Session::get('update_dish') }}
                </div>
            @endif
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
                                            <div class="product-main-image__item">
                                            @if(isset($dish->picture))
                                                <img class="product-zoom" src="{{ config('asset.image_path.dish_detail').$dish->picture }}" data-zoom-image="{{ config('asset.image_path.dish_detail').$dish->picture }}" alt="" /></div>
                                            @else
                                                <img class="product-zoom" src="{{ config('asset.image_path.dish_detail').'dish_none.png' }}" data-zoom-image="{{ config('asset.image_path.dish_detail').'dish_none.png' }}" alt="" /></div>
                                            @endif
										    <div class="product-main-image__zoom"></div>
                                        </div>
                                        <div class="product-images-carousel">
                                            <ul id="smallGallery" class="images-slide">
                                            @if(isset($dish->picture))
                                                @foreach ($dish->dishImages as $image)
                                                    @if($image->link != null)
                                                        <li><a href="#" data-image="{{ config('asset.image_path.dish_detail').$image->link }}" data-zoom-image="{{ config('asset.image_path.dish_detail').$image->link }}"><img src="{{ config('asset.image_path.dish_detail').$image->link }}" alt="" /></a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                                
                                            </ul>
                                        </div>
                                        <ul class="product-link">
                                            <li class="text-right">
                                                @if((isset(Auth::user()->id) == null) || (isset(Auth::user()->id) && $favorites->count()==0))
                                                    {!! Form::open(['method' => 'POST', 'route' => 'dishes.like', 'class' => 'form-favortie']) !!}
                                                        <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                                        @if(isset(Auth::user()->id))
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        @endif
                                                        <span><span class="fa fa-heart tooltip-link"></span>{!! Form::submit(trans('dish.like'), ['class'=> 'form-favorite-submit']) !!}</span>
                                                    {!! Form::close() !!}
                                                @elseif(isset(Auth::user()->id) && $favorites->count() !=0)
                                                    <?php 
                                                        $user_like = 0; 
                                                        $user_dislike = 0;
                                                    ?>
                                                    @foreach($favorites as $favorite)
                                                        @if( $favorite->user_id == Auth::user()->id )
                                                            {!! Form::open(['method' => 'POST', 'route' => 'dishes.disLike', 'class' => 'form-favortie']) !!}
                                                                <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                <span><span class="fa fa-heart tooltip-link"></span>{!! Form::submit(trans('dish.dislike'), ['class'=> 'form-favorite-submit']) !!}</span>
                                                            {!! Form::close() !!}
                                                            <?php $user_dislike += 1; ?>
                                                        @elseif($favorite->user_id != Auth::user()->id)
                                                            <?php $user_like += 1; ?>
                                                        @endif
                                                    @endforeach
                                                    @if($user_like != 0 && $user_dislike == 0)
                                                        {!! Form::open(['method' => 'POST', 'route' => 'dishes.like', 'class' => 'form-favortie']) !!}
                                                            <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                            <span><span class="fa fa-heart tooltip-link"></span>{!! Form::submit(trans('dish.like'), ['class'=> 'form-favorite-submit']) !!}</span>
                                                        {!! Form::close() !!}
                                                    @endif
                                                @endif
                                            </li>
                                            <li class="text-left"><a href="#"><span class="fa fa-print tooltip-link"></span><span> {{ trans('dish.print') }}</span></a></li>
                                            <li class="text-left"><a href="#"><span class="fa fa-share-square tooltip-link"></span><span> {{ trans('dish.share') }}</span></a></li>
                                        </ul>
                                        <ul class="product-link product-link-2">
                                            <li><a href="{{ route('dishes.create') }}" class="btn btn-success"><strong>{{ trans('dish.add') }}</strong></a></li>
                                            @if(isset(Auth::user()->id) && (Auth::user()->id == $dish->user->id))
                                                <li>
                                                    <a href="{{ route('dishes.edit', $dish->slug) }}" class="btn btn-info">
                                                        <strong>{{ trans('dish.edit') }}</strong>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:" 
                                                        class="btn btn-danger" 
                                                        id="destroy-dish"
                                                        dishId = "{{ $dish->id }}"
                                                        dishName = "{{ $dish->name }}"
                                                        dishRoute = "{{ route('dishes.destroy', $dish->id) }}">
                                                        <strong>{{ trans('dish.destroy') }}</strong>
                                                    </a>
                                                </li>
                                            @endif
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
                                            <div class="product-info__description__brand">
                                            @if(isset($dish->user->avatar))
                                                <img src="{{ config('asset.image_path.owner_avatar').$dish->user->avatar }}" class="avatar_chef" alt=""/>
                                            @else
                                                <img src="{{ config('asset.image_path.owner_avatar').'avatar_cat.png' }}" class="img-circle">
                                            @endif
                                            </div>
                                            <div class="product-info__description__text">
                                                {{ trans('dish.repice') }}: <a href="{{ route('users.profile', $dish->user->slug) }}"><strong class="color">{{ $dish->user->name }}</strong></a>
                                                <div class="divider divider--xs product-info__divider hidden-xs"></div>
                                                "{{ $dish->description }}"
                                            </div>
                                        </div>
                                        <div class="categories">
                                            @foreach ($dish->categories as $category)
                                                <a href="{{ route('cate.show', $category->slug) }}" class="category">{{ $category->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="product-link product-fact">
                                        <li><span class="fa fa-smile-o"></span> {{ trans('dish.farina') }}: {{ $dish->farina_amount }} {{ trans('dish.gam') }}</li>
                                        <li><span class="fa fa-pie-chart"></span> {{ trans('dish.protein') }}: {{ $dish->protein_amount }} {{ trans('dish.gam') }}</li>
                                        <li><span class="fa fa-coffee"></span> {{ trans('dish.lipid') }}: {{ $dish->lipid_amount }} {{ trans('dish.gam') }}</li>
                                        <li><span class="fa fa-tint"></span> {{ trans('dish.calories') }}: {{ $dish->calories_amount }} {{ trans('dish.calo') }}</li>
                                    </ul>
                                    <!-- Nav tabs Ingredient -->
                                    <ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
                                        <li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">{{ trans('dish.ingredient') }}</a></li>
                                    </ul>
                                    <div class="tab-content tab-content--ys nav-stacked">
                                        <div role="tabpanel" class="tab-pane active" id="Tab1">
                                            <div class="divider divider--md"></div>
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
                                            <div class="divider divider--xs"></div>
                                            <ul>
                                            @for($i = 0; $i<$step_count; $i++)
                                                <li><span class="fa fa-check"></span><?php echo " Bước ".($i+1).": ".$dish->cookingsteps[$i]->step ?></li>
                                            @endfor
                                            </ul>

                                        </div>
                                    </div>

                                    <!-- Ntriion Facts -->
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
	<script src="{{ asset('bower_components/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
    
    <!-- Delete dish with SweetAlert2 -->

    <script>
        $(document).on('click', '#destroy-dish', function(e){
            e.preventDefault();
            var dishRoute = $(this).attr("dishRoute");
            var dishName = $(this).attr("dishName");
            var dishId = $(this).attr("dishId");
            // alert(dishId);
            swal({
                    title: "Xóa món ăn!",
                    text: "Bạn có chắc chắn rằng bạn sẽ xóa " + dishName + " ? " +
                    "Mọi dữ liệu sẽ bị xóa vĩnh viễn!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Xóa!",
                    confirmButtonColor: "#d33",
                    cancelButtonText: "Hủy",
                    cancelButtonColor:"#3085d6",
                    buttonStyling: false,
                }).then(
                    $('button.swal2-confirm').click(
                        function(){
                            window.location.href = dishRoute;
                        }
                    ) 
                );
        });
    </script>
@endsection
