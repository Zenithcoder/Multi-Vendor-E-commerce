@extends('frontend.layout')

@section('content')
    <div class="page-title fix"><!--Start Title-->
        <div class="overlay section">
            <h2>Search result</h2>
        </div>
    </div><!--End Title-->


    </div>
    </div>
    </div>

    <div class="shop-product-area section fix"><!--Start Shop Area-->
        <div class="container">
            <div class="row">

                <div class="shop-products">
                    <!-- Single Product Start -->
                    @foreach($searchItems as $searchItem)
                    <div class="col-sm-4 col-md-3 fix">
                        <div class="product-item fix">
                            <div class="product-img-hover">
                                <!-- Product image -->
                                <a href="product-details.html" class="pro-image fix"><img src="img/product/1.jpg" alt="product" /></a>
                                <!-- Product action Btn -->
                                <div class="product-action-btn">
                                    <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                    <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                    <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="pro-name-price-ratting">
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="product-details.html">{{$searchItem->name}}</a>
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
                                    <p><span class="old">$165</span><span class="new">$150</span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                @endforeach

                </div>
                <!-- Pagination -->
                <div class="pagination">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div><!--Start Shop Area-->

@endsection