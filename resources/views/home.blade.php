@extends('layouts.master')

@section('head')
  <script src="{{ asset('js/slide.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}">
@endsection

@section('content')
    <div class="slider-relative">
        <div class="slider-block">
            <div class="slider">
            <ul class="items">
                <li><img src="{{ asset('/images/slides/15.jpg') }}" alt=""></li>
                <li><img src="{{ asset('/images/slides/14.jpg') }}" alt=""></li>
                <li class="mb0"><img src="{{ asset('/images/slides/12.jpg') }}" alt=""></li>
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
            <h2>{{ trans('homepage.favorites') }}</h2>
            <a href="#" class="prev"></a><a href="#" class="next"></a>
            <ul class="carousel1">
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img1.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>                  
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img2.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>                  
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img3.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>                  
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img4.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>                  
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img3.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>                  
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="clear"></div>

        <div class="bottom_block">
            <div class="grid_6">
                <h3>{{ trans('homepage.follow_us') }}</h3>
                <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
                <nav>
                <ul>
                    <li class="current"><a href="index.html">{{ trans('headertext.home') }}</a></li>
                    <li><a href="about-us.html">{{ trans('headertext.aboutus') }}</a></li>
                    <li><a href="menu.html">{{ trans('headertext.contact') }}</a></li>
                </ul>
                </nav>
            </div>
            <div class="grid_6">
                <h3>{{ trans('homepage.feedback') }}</h3>
                <p class="col1">{{ trans('homepage.feedback_encourage') }}</p>
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
            </div>
        </div>

        <div class="clear"></div>
      </div>
    </div>
@endsection
