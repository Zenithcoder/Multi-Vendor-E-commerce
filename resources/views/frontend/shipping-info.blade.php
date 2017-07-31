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
    <section class="checkout-page page fix"><!--Start Checkout Area-->
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="checkout-progress">
                        <div class="panel panel-default">
                            <div class="panel-heading" >
                                <a data-parent="#checkout-progress"  href="#bill-info">SHIPPING INFORMATION</a>
                            </div>

                                <div class="panel-body">
                                    <div class="bill-info">
                                        {!! Form::open(['route'=>'address.store','method'=>'post']) !!}
                                        <div class="group">
                                            <input type="text" name="name" placeholder="First Name
                                                          Last Name" class="onethird"  required>
                                        </div>

                                        <input type="text" name="address" placeholder="STREET ADDRESS*" required>
                                        <input type="text" name="city" class="half" placeholder="city" required>
                                        <div class="group">
                                            <input type="text" name="state" placeholder="STATE*" class="half" required>
                                            <input type="text" name="postcode" placeholder="POSTCODE*" class="half" required>
                                        </div>
                                        <div class="group">
                                            <input type="text" name="phoneno" placeholder="PHONE NUMBER*" class="half" required>

                                        </div>
                                    </div>
                                </div>
                                    <div class="col-sm-offset-4">
                                        <button type="submit" class="btn btn-sm btn-warning">CONTINUE TO PAYMENT</button>
                                    </div>

                                        {!! Form::close() !!}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--End Checkout Area-->
    </div><!--Start Shop Area-->

@endsection