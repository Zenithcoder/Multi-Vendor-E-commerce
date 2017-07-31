@extends('backend.layout_backend')

@section('content')
    <?php
    if($edit==0) {
        $name = '';

        $action = array('route'=>'brands.store','class'=>'form-horizontal','name'=>'edit');
    } elseif($edit ==1) {
        $id = $brand_edit->id;
        $name = $brand_edit->name;

        $action = array('route'=>['brands.update', $id],'method'=>'PUT','class'=>'form-horizontal','name'=>'edit');
    }
    ?>

    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">category</a> </div>
        <h1>Category</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span5">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                        <h5>Add New Brand</h5>
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
                                    <label for="sel1">Sub category</label>
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
                                <label>Brand name</label>

                                {{Form::text('name',$name, array('type'=>'text',
                           'class'=>'form-control','placeholder'=>'Brand Name', 'required'))}}
                            </div>
                        </div>
                            @if($edit==0)
                        {{ Form::button('Save Subcategory', array('class' => 'btn btn-primary','type'=>'submit')) }}
                            @elseif($edit==1)
                                {{ Form::button('UpdateSubcategory', array('class' => 'btn btn-primary','type'=>'submit')) }}
                                @endif
                        {{ Form::button('Cancel', array('class' => 'btn btn-default','type'=>'reset')) }}


                        {{Form::close()}}


                    </div>
                </div>
            </div>

            <div class="span7">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>Sub Category</h5>
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
                                    <th>Category name</th>
                                    <th>Sub Category name</th>
                                    @if($edit==0)
                                    <th>Action</th>
                                        @elseif($edit==1)
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @if('brands')
                                    @forelse($brands as $brand)
                                        <tr>
                                            <td class="taskDesc">{{$brand->category->name}}</td>
                                            <td class="taskDesc">{{$brand->name}}</td>

                                            <td class="taskOptions">

                                                {!! Form::open(array('url'=>['brands', $brand->id],'method'=>'PUT','style'=>'float:left')) !!}
                                                {{Form::hidden('id',$brand->id)}}

                                                {!! Form::close() !!}
                                                @if($edit==0)

                                                <a href="{{Route('brands.edit',$brand->id)}}"  style="float:left" class="btn btn-sm btn-info">
                                                    <i class="icon-edit"></i>
                                                </a>
                                                    @elseif($edit==1)

                                                        @endif
                                                {{Form::open(array('route'=> ['brands.destroy', $brand->id],'method'=>'delete','style'=>'float:left'))}}
                                                @if($edit==0)
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                @elseif($edit==1)
                                                    @endif
                                                {{Form::hidden('id',$brand->id)}}
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
