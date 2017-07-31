


            <div class="menu-area"><!--Start Main Menu Area-->
                <div class="container">
                    <div class="row">
                        <div class="clo-md-12">
                            <div class="main-menu hidden-sm hidden-xs">
                                <nav>
                                    <ul>
                                        <li><a href="/" class="active">Home</a>
                                        </li>
                                        @if($categories)
                                            @foreach($categories as $category)
                                        <li><a href="{{route('collection.show',$category->id)}}">{{$category->name}}</a>
                                            <ul class="sub-menu">

                                                            @foreach($category->brands as $brand)
                                                <li><a href="{{route('collection.subproduct',$brand->id)}}">{{$brand->name}}</a></li>
                                                            @endforeach

                                            </ul>
                                        </li>
                                            @endforeach
                                            @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu hidden-md hidden-lg">
                            <nav>
                            <ul>
                            <li><a href="index.html" class="active">Home</a>
                            </li>
                            <li><a href="/shop">Shop</a>
                            <ul>
                            <li><a href="shop-list.html">Necklaces</a>
                            <ul>
                            <li><a href="shop-right-sidebar.html">diamond lecklaces</a></li>
                            <li><a href="shop-left-sidebar.html">gold lecklaces</a></li>
                            <li><a href="shop-right-sidebar.html">sliver lecklaces</a></li>
                            <li><a href="shop-left-sidebar.html">Platinum lecklaces</a></li>
                            </ul>
                            </li>
                            </ul>
                            </li>
                            <li><a href="/">Top brand</a>
                            <ul>
                            <li><a href="shop-list.html">rings</a>
                            <ul>
                            <li><a href="shop-left-sidebar.html">diamond ring</a></li>
                            <li><a href="shop-right-sidebar.html">gold ring</a></li>
                            <li><a href="shop-list.html">sliver ring</a></li>
                            <li><a href="shop-left-sidebar.html">Platinum ring</a></li>
                            </ul>
                            </li>

                            </ul>
                            </li>
                            <li><a href="portfolio.html">Contact Us</a>
                            <ul>
                            <li><a href="portfolio.html">Portfolio 3 column</a></li>
                            <li><a href="portfolio-2.html">Portfolio 4 column</a></li>
                            </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                            </li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact</a>
                            </li>
                            </ul>
                            </nav>
                            </div>
            </div><!--End Main Menu Area-->

