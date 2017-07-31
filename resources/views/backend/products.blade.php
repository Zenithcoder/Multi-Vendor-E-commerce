@extends('backend.layout_backend')

@section('content')
    <?php
    if($edit==0) {
        $name = '';
        $price = '';
        $qty = '';
        $category = '';
        $brand = '';
        $action = array('route'=>'products.store','class'=>'form-horizontal','name'=>'edit','files'=>true);
    } elseif($edit ==1) {
        $id = $product_edit->id;
        $name = $product_edit->name;
        $price = $product_edit->price;
        $qty = $product_edit->qty;
        $category = $product_edit->category_id;
        $brand = $product_edit->brand_id;
        $action = array('route'=>['products.update', $id],'method'=>'PUT','class'=>'form-horizontal','name'=>'edit', 'files' => true);
    }
    ?>

    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">products</a> </div>
        <h1>Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span4">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                        <h5>Add New Product</h5>
                    </div>
                    <div class="widget-content">
                        <?php
                        $msg = Session::get('msg');
                        if($msg) {
                        ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $msg }}</strong>
                        </div>
                        <?php } ?>

                        {{Form::open($action)}}
                        <div class="form-group">
                            <div class="col-xs-9">
                                <label>Product name</label>
                                {{Form::text('name',$name, array('type'=>'text', 'class'=>'form-control','placeholder'=>'Product Name', 'required'))}}
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-xs-9">
                                    <label>Product amount</label>
                                    {{Form::text('price',$price, array('type'=>'number',
                               'class'=>'form-control','placeholder'=>'Product amount', 'required'))}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9">
                                    <label>Quantity</label>
                                    {{Form::text('qty',$qty, array('type'=>'number',
                               'class'=>'form-control','placeholder'=>'Product Quantity', 'required'))}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9">
                                <label for="sel1">Category</label>
                                <select name="category_id">
                                        <option value="1">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9">
                                    <label for="sel1">Sub category</label>
                                    <select name="brand_id">
                                        <option value="1">Select</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9">
                                    <label for="sel1">Upload image</label>
                                    {!! Form::file('image', null, ['class'=>'']) !!}
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}" />

                            @if($edit==0)
                        {{ Form::button('Save Product', array('class' => 'btn btn-primary','type'=>'submit')) }}
                            @elseif($edit==1)
                                {{ Form::button('Update Product', array('class' => 'btn btn-primary','type'=>'submit')) }}
                                @endif
                        {{ Form::button('Cancel', array('class' => 'btn btn-default','type'=>'reset')) }}


                        {{Form::close()}}


                    </div>
                </div>
            </div>

            <div class="span8">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>Products</h5>
                    </div>
                    <?php
                    $msg = Session::get('message');
                    if($msg) {
                    ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $msg }}</strong>
                    </div>
                    <?php } ?>
                    <div class="widget-content">
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Product Amount</th>
                                    <th>Product Qty</th>
                                    <th>Category</th>
                                    <th>Sub category</th>
                                    <th>User</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if('Products')
                                    @forelse($products as $product)
                                        <tr>
                                            <td class="taskDesc">{{$product->name}}</td>
                                            <td class="taskDesc">#{{$product->price}}</td>
                                            <td class="taskDesc">{{$product->qty}}</td>
                                            <td class="taskDesc">{{$product->category->name}}</td>
                                            <td class="taskDesc">{{$product->brand->name}}</td>
                                            <td class="taskDesc">{{$product->user->name}}</td>
                                            <td class="taskDesc"><img src="{{asset('img/uploads/'.$product->image)}}" height="50px" alt=""></td>
                                            <td class="taskOptions">
                                                {!! Form::open(array('url'=>['products', $product->id],'method'=>'PUT','style'=>'float:left')) !!}
                                                {{Form::hidden('id',$product->id)}}
                                                {!! Form::close() !!}

                                                @if($edit==0)
                                                <a href="{{Route('products.edit',$product->id)}}"  style="float:left" class="btn btn-sm btn-info">

                                                    <i class="icon-edit"></i>
                                                </a>
                                                {{Form::open(array('route'=> ['products.destroy', $product->id],'method'=>'delete','style'=>'float:left'))}}


                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                @elseif($edit==1)
                                                    @endif
                                                {{Form::hidden('id',$product->id)}}
                                                {{Form::close()}}
                                            </td>
                                        </tr>
                                    @empty
                                        <td class="taskDesc">NO DATA</td>

                                    @endforelse
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
