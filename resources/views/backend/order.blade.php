@extends('backend.layout_backend')

@section('content')

        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
                            <h5 >Orders</h5>
                        </div>
                        @foreach($orders as $order)
                        <div class="widget-content">
                            <div class="row-fluid">

                                <div class="span6">
                                    <table class="">
                                        <tbody>
                                        <tr>
                                            <td><h4>Name: {{$order->user->name}}</h4></td>
                                        </tr>
                                        <tr>
                                            <td class="width30">Payment ID:</td>
                                            <td class="width70"><strong>{{$order->payment_id}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Phone:</td>
                                        </tr>
                                        <tr>
                                            <td >email</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="span6">
                                    @foreach($order->orderItems as $item)
                                        <form action="{{route('toggle.deliver',$order->id)}}" method="POST">
                                            {{csrf_field()}}
                                    <table class="table table-bordered table-invoice">
                                        <div class="control-group pull-right">
                                            <label class="control-label">Delivered</label>
                                            <div class="controls">
                                                <input type="checkbox" value="1" name="delivered" {{$order->deliver==1?"checked":""}}/>
                                                <input type="submit" value="submit" />
                                            </div>
                                        </div>

                                        <tbody>
                                        <tr>
                                        <tr>
                                            <td class="width30">Item:</td>
                                            <td class="width70"><strong>{{$item->name}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Date:</td>
                                            <td><strong>{{$item->created_at}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Quantity</td>
                                            <td><strong>{{$item->pivot->qty}}</strong></td>
                                        </tr>
                                        <td class="width30">Amount</td>
                                        <td class="width70">#{{$item->pivot->total}}</td>
                                        </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                        </form>
                                </div>

                            </div>

                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="pull-right">
                                        <h4><span>Total Amount:</span> #{{$order->total}}</h4>
                                        <br>
                                        <a class="btn btn-primary btn-large pull-right" href="">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection
