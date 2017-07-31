@extends('frontend.layout')


@section('content')

    <div class="page-title fix"><!--Start Title-->
        <div class="overlay section">
            <h2>Cart</h2>
        </div>
    </div><!--End Title-->


    </div>
    </div>
    </div>




    <section class="cart-page page fix"><!--Start Cart Area-->
        <div class="container">

            <div class="row">
                <?php
                $count = Cart::count();
                ?>
                @if($count >= 1)

                    <div class="col-sm-12">
                        <div class="table-responsive">

                            <table class="table cart-table">
                                <thead class="table-title">
                                <tr>
                                    <th class="namedes">PRODUCT NAME &amp; DESCRIPTION</th>
                                    <th class="unit">UNIT PRICE</th>
                                    <th class="quantity">QUANTITY</th>
                                    <th class="valu">VALUE</th>
                                    <th class="acti">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cartItems as $cartItem)
                                    <tr class="table-info">
                                        <td class="namedes">
                                            <h2><a href="#">{{$cartItem->name}}</a></h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </td>
                                        <td class="unit">
                                            <h5>{{$cartItem->price}}</h5>
                                        </td>
                                        <td class="quantity">
                                            <div class="">
                                                {!! Form::open(['route'=>['cart.update',$cartItem->rowId],'method'=>'PUT']) !!}

                                                <input name="qty" type="text" value="{{$cartItem->qty}}">
                                               <!-- <button type="submit" name="qty" ></button>-->
                                               <input style="float: right"  type="submit" class="button success small" value="OK" >
                                                {!! Form::close() !!}

                                            </div>
                                        </td>
                                        <td class="valu">

                                            <h5>{{($cartItem->qty)*($cartItem->price)}}</h5>

                                        </td>
                                        <td class="acti">
                                            {!! Form::open(['route'=>['cart.destroy',$cartItem->rowId],'method'=>'delete']) !!}
                                            <button type="submit"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <td>NO ITEMS IN THE CART</td>
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-7">

                    </div>
                    <div class="col-sm-6 col-md-5">
                        <div class="proceed fix">
                            {{--<a href="">CLEAR SHOPPING CART</a>--}}

                         <!--   <a href="" type="submit">UPDATE SHOPPING CART</a>-->

                            <div class="total">
                                <h6>Total <span style="text-decoration: line-through;">N</span>{{Cart::subtotal()}}</h6>
                            </div>

                            <a id="procedto" href="{{route('checkout.shipping')}}">PROCEED TO CHECK OUT</a>

                        </div>
                    </div>
                @else
                    <div class="section-title">
                        <h2>NO ITEM IN THE CART</h2>
                    </div>

                @endif
            </div>

        </div>
    </section><!--End Cart Area-->

@endsection

