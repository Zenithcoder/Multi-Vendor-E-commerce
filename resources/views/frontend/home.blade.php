@extends('frontend.layout')


@section('content')
    <!-- HOME SLIDER -->
    <div class="slider-wrap home-1-slider">
        <div id="mainSlider" class="nivoSlider slider-image">
            <img src="{{asset('img/slider/banner1.jpg')}}" alt="main slider" title="#htmlcaption1"/>
            <img src="{{asset('img/slider/banner2.jpg')}}" alt="main slider" title="#htmlcaption2"/>
        </div>
        {{--<div id="htmlcaption1" class="nivo-html-caption slider-caption-1">--}}
            {{--<div class="slider-progress"></div>--}}
            {{--<div class="slide1-text slide-text">--}}
                {{--<div class="middle-text">--}}
                    {{--<div class="cap-readmore wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0s">--}}
                        {{--<a href="#">Shop Now</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div id="htmlcaption2" class="nivo-html-caption slider-caption-2">--}}
            {{--<div class="slider-progress"></div>--}}
            {{--<div class="slide2-text slide-text">--}}
                {{--<div class="middle-text">--}}
                    {{--<div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">--}}
                        {{--<a href="#">Shop Now</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>



    <div class="home-3-slider col-md-9 col-lg-10">
        <div id="mainSlider" class="nivoSlider slider-image">
            <img src="{{asset('img/slider/banner1.jpg')}}" alt="main slider" title="#htmlcaption1"/>
            <img src="{{asset('img/slider/banner2.jpg')}}" alt="main slider" title="#htmlcaption2"/>
        </div>
        {{--<div id="htmlcaption1" class="nivo-html-caption slider-caption-1">--}}
            {{--<div class="slider-progress"></div>--}}
            {{--<div class="slide1-text slide-text">--}}
                {{--<div class="middle-text">--}}
                    {{--<div class="cap-readmore wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0s">--}}
                        {{--<a href="{{asset('/collection')}}">Shop Now</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div id="htmlcaption2" class="nivo-html-caption slider-caption-2">--}}
            {{--<div class="slider-progress"></div>--}}
            {{--<div class="slide1-text slide-text">--}}
                {{--<div class="middle-text">--}}
                    {{--<div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">--}}
                        {{--<a href="{{asset('/collection')}}">Shop Now</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <!--End Slider Area-->

    </div>
    </div>
    </div>



    <!--start Featured Product Area-->
    <div class="featured-product section fix">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>New Collection</h2>
                    <div class="underline"></div>
                </div>
                <div class="shop-products">
                    <!-- Single Product Start -->
                    @foreach($products as $product)
                    <div class="col-sm-4 col-md-3 fix" id="product{{$product->id}}">
                        <div class="product-item fix">
                            <div class="product-img-hover">
                                <!-- Product image -->
                                <a href="details/{{$product->id}}" class="pro-image fix"><img src="{{asset('img/uploads/'.$product->image)}} " alt="product" height="250px" width="250px"/></a>
                                <!-- Product action Btn -->
                            </div>
                            <div class="pro-name-price-ratting">
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="details/{{$product->id}}">{{$product->name}}</a>
                                </div>
                                <!-- Product Ratting -->
                                <div class="pro-ratting">
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star-half-o"></i>
                                </div>
                                <!-- Product Price -->
                                <div class="pro-price fix">
                                    <p><span class="new"><span style="text-decoration: line-through;">N</span>{{$product->price}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-icon">
                                <a class="btn btn-warning " href="{{route('cart.show',$product->id)}}"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                                <div>
                              <a class="btn btn-warning" href="{{route('cart.buy',$product->id)}}">BUY NOW</a>
                            </div>

                        </div>

                    </div><!-- Single Product End -->
                        @endforeach
                </div>
                <br>
            </div>
        </div>
    </div><!--End Featured Product Area-->
    <div class="banner-area fix"><!-- Product Offer Area Start -->
        <div class="col-sm-6 sin-banner">
            <a href="{{url('/subcategory/3')}}">
                <img src="img/offer/bags.jpg" alt="" />
                <div class="wrap">
                    <h2>Bags</h2>
                    <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 sin-banner">
            <a href="#">
                <img src="img/offer/shoes.jpg" alt="" />
                <div class="wrap">
                    <h2>Shoes</h2>
                    <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
                </div>
            </a>
        </div>
        <div class="col-sm-2 hidden-xs sin-banner text-1">
            <img src="img/offer/new_arrival.jpg" alt="" />
            <div class="banner-text">
                <h1><span>New</span></h1>
                <h2>Arrivals</h2>
                <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
                <a href="#">Shop Now</a>
            </div>
        </div>
        <div class="col-sm-2 hidden-xs sin-banner clear text-2">
            <img src="img/offer/new_arrival.jpg" alt="" />
            <div class="banner-text">
                <h1>Sales <span>Up to</span></h1>
                <h2><span>30%</span>off</h2>
                <a href="#">Shop Now</a>
            </div>
        </div>
        <div class="col-sm-6 sin-banner">
            <a href="#">
                <img src="img/offer/rings.jpg" alt="" />
                <div class="wrap">
                    <h2>Rings</h2>
                    <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 sin-banner">
            <a href="#">
                <img src="img/offer/necklaces.jpg" alt="" />
                <div class="wrap">
                    <h2>Necklaces</h2>
                    <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
                </div>
            </a>
        </div>
    </div><!-- Product Offer Area End -->


    <div class="testimonial-area fix"><!--Start Testimonial Area-->
        <div class="overlay section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                        <div class="testimonial-slider  owl-carousel">
                            <div class="testimonial-item">
                                <div class="image fix">
                                    <img src="img/testimonial/testimonial.jpg" alt="" />
                                </div>
                                <div class="content fix">
                                    <p>Lorem ipsum dolor sit amet, consectetur adiising elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                                    <h3>Zasika Williams</h3>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="image fix">
                                    <img src="img/testimonial/testimonial.jpg" alt="" />
                                </div>
                                <div class="content fix">
                                    <p>Lorem ipsum dolor sit amet, consectetur adiising elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                                    <h3>Zasika Williams</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Testimonial Area-->



    @endsection