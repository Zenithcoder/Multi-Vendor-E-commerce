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

    <div class="login-page page fix"><!--start login Area-->
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-sm-6 col-md-5">
                    <div class="login">

                            <div class="container">
                                <div class="row">
                                    <!-- You can make it whatever width you want. I'm making it full width
on <= small devices and 4/12 page width on >= medium devices -->
                                    <div class="col-xs-12 col-md-4">


                                        <!-- CREDIT CARD FORM STARTS HERE -->
                                        <div class="panel panel-default credit-card-box">
                                            <div class="panel-heading display-table" >
                                                <div class="row display-tr" >
                                                    <h3 class="panel-title display-td" >Payment Details</h3>
                                                    <div class="display-td" >
                                                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                    <form action="{{route('payment.store')}}" method="post" id="payment-form">
                                                        {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                <label for="cardName">CARD NAME</label>
                                                                <div class="input-group">
                                                                    <input
                                                                            type="tel"
                                                                            id="card-name"
                                                                            class="form-control"
                                                                            name="cardName"
                                                                            placeholder="Enter Card Name"
                                                                            autocomplete="cc-name"
                                                                            required autofocus
                                                                    />
                                                                    <span class="input-group-addon"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                <label for="cardNumber">CARD NUMBER</label>
                                                                <div class="input-group">
                                                                    <input
                                                                            type="tel"
                                                                            id="card-number"
                                                                            class="form-control"
                                                                            name="cardNumber"
                                                                            placeholder="Valid Card Number"
                                                                            autocomplete="cc-number"
                                                                            required autofocus
                                                                    />
                                                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-md-4">
                                                            <div class="form-group">
                                                                <label for="cardExpiry"><span class="hidden-xs"></span>EXP<span class="visible-xs-inline"></span> MONTH</label>
                                                                <input
                                                                        type="tel"
                                                                        id="card-expiry-month"
                                                                        class="form-control"
                                                                        name="cardExpiry"
                                                                        placeholder="MM"
                                                                        autocomplete="cc-exp"
                                                                        required
                                                                />

                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4 col-md-4 pull-left">
                                                            <div class="form-group">
                                                                <label for="cardCVC">EXP YEAR</label>
                                                                <input
                                                                        type="tel"
                                                                        id="card-expiry-year"
                                                                        class="form-control"
                                                                        name="cardCVC"
                                                                        placeholder="YY"
                                                                        autocomplete="cc-exp"
                                                                        required
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4 col-md-4 pull-right">
                                                            <div class="form-group">
                                                                <label for="cardCVC">CV CODE</label>
                                                                <input
                                                                        type="tel"
                                                                        id="card-cvc"
                                                                        class="form-control"
                                                                        name="cardCVC"
                                                                        placeholder="CVC"
                                                                        autocomplete="cc-csc"
                                                                        required
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <input type="hidden" name="user_id" value="" />
                                                            <button class="btn btn-warning btn-lg btn-block" type="submit">Start Payment</button>
                                                        </div>
                                                    </div>
                                                    <div id="charge-error" class="alert alert-danger {{!Session::has('error') ? 'hidden' :''}}">
                                                        {{Session::get('error')}}
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- CREDIT CARD FORM ENDS HERE -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End login Area-->
    </div><!--Start Shop Area-->

@endsection
