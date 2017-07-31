
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <div class="log-link">
                    @if($user)
                        <h4>Welcome {{$user->name}}</h4>
                    @else
                        <p>Welcome visitor you can</p>
                        <h5><a href="/login">Login</a> or <a href="/signup">Create an account</a></h5><br>
                <a href="{{asset('/vendor-signup')}}" class="btn btn-sm btn-warning" role="button">BECOME A VENDOR</a>
                @endif
                </div>

            </div>
            <div class="col-sm-4 col-lg-6">
                <div class="logo text-center">
                    <a href="{{url('/')}}">
                        <img src="{{asset('img/header/logo.png')}}" alt="" />
                        <h6>Home of African Fashion</h6>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3">
                <div class="cart-info float-right">
                    <a href="{{route('cart.index')}}">
                        <h5>My cart <span>{{Cart::count()}}</span> items - <span style="text-decoration: line-through;">N</span>{{Cart::subTotal()}}</h5>
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
                <div class="search float-right">
                    <input type="text" value="" placeholder="Search Here...." />
                    <button class="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

