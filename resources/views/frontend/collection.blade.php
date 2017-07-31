@extends('frontend.layout')

@section('content')
    <div class="page-title fix"><!--Start Title-->
        <div class="overlay section">
            <h2>Shop</h2>
        </div>
    </div><!--End Title-->

    </div>
    </div>
    </div>

    <div class="shop-product-area section fix"><!--Start Shop Area-->
        <div class="container">
            @if(Session::has('success'))
            <div class="row">
                <div class="col-sm-6 col-md-4 col md-offset-4 col-sm-offset-3">
                    <div id="charge-message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="shop-tool-bar col-sm-12 fix">
                    <div class="sort-by">
                        <span>Sort By</span>
                        <select name="sort-by">
                            <option selected="selected" value="mercede">price: Lower</option>
                            <option value="saab">price(low&gt;high)</option>
                            <option value="mercedes">price(high &gt; low)</option>
                            <option value="audi">rating(highest)</option>
                        </select>
                    </div>
                    <div class="show-product">
                        <span>Show</span>
                        <select name="sort-by">
                            <option selected="selected" value="mercede">16</option>
                            <option value="saab">20</option>
                            <option value="mercedes">24</option>
                        </select>
                        <span>Per Page</span>
                    </div>
                    <div class="pro-Showing">
                        <span>Showing 1 - 12 of 16 items</span>
                    </div>
                </div>
                <div class="shop-products">
                    <!-- Single Product Start -->
                   @forelse($products as $product)
                    <div class="col-sm-4 col-md-3 fix">
                        <div class="product-item fix">
                            <div class="product-img-hover">
                                <!-- Product image -->
                                <a href="details/{{$product->id}}" class="pro-image fix"><img src="{{asset('img/uploads/'.$product->image)}}" alt="product" /></a>
                                <!-- Product action Btn -->
                                <div class="product-action-btn">
                                    <a class="add-cart" href="{{route('cart.show',$product->id)}}"><i class="fa fa-shopping-cart">Add to cart</i></a>
                                </div>
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
                                    <p><span class="old">$165</span><span class="new">#{{$product->price}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                       @empty()
                       <li>NO DATA</li>
                       @endforelse
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