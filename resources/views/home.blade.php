@extends('layouts.master')

@section('head')
  <script src="{{ asset('js/slide.js') }}"></script>
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
        <div class="grid_7">
          <h2>Welcome</h2>
          <div class="page1_block col1"> <img src="{{ asset('/images/images-temp/welcome_img.png') }}" alt="">
            <div class="extra_wrapper">
              <p><span class="col2"><a href="#">Click here</a></span> for more info about this free website template created by TemplateMonster.com </p>
              Aenean nonummy hendrerit mau rellus porta. Fusce suscipit varius m sociis natoque penaibet magni parturient montes nasetur ridiculumula dui. <br>
              <a href="#" class="btn">more</a> </div>
            <div class="clear"></div>
          </div>
        </div>

        <div class="grid_5">
          <h2>Features</h2>
          <ul class="list">
            <li><a href="#">Unlimited consultations and/or planning</a></li>
            <li><a href="#">Expert advice on traditions, customs, aetiquette</a></li>
            <li><a href="#">Determine and stay within budget</a></li>
            <li><a href="#">Choosing the right Wedding Venue</a></li>
            <li><a href="#">Provide preferred vendor's list</a></li>
            <li><a href="#">Assist with wedding scheme and design</a></li>
          </ul>
        </div>

        <div class="clear"></div>

        <div class="grid_12">
          <div class="hor_separator"></div>
        </div>

        <div class="grid_12">
          <div class="car_wrap">
            <h2>Best Choice</h2>
            <a href="#" class="prev"></a><a href="#" class="next"></a>
            <ul class="carousel1">
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img1.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>
                  <div class="price">45$</div>
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img2.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>
                  <div class="price">45$</div>
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img3.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>
                  <div class="price">45$</div>
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img4.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>
                  <div class="price">45$</div>
                </div>
              </li>
              <li>
                <div><img src="{{ asset('/images/images-temp/page1_img3.jpg') }}" alt="">
                  <div class="col1 upp"> <a href="#">Lorem ipsum doamet consectet</a></div>
                  <span> Dorem ipsum dolor amet consectetur</span>
                  <div class="price">45$</div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="clear"></div>

        <div class="bottom_block">
            <div class="grid_6">
                <h3>Follow Us</h3>
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
                <h3>Email Updates</h3>
                <p class="col1">Join our digital mailing list and get news<br>
                deals and be first to know about events</p>
                <form id="newsletter" action="#">
                <div class="success">Your subscribe request has been sent!</div>
                <label class="email">
                    <input type="email" value="Enter e-mail address" >
                    <a href="#" class="btn" data-type="submit">subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
                </form>
            </div>
        </div>

        <div class="clear"></div>
      </div>
    </div>
@endsection
