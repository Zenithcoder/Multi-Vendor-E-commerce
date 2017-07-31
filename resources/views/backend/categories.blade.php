@extends('backend.layout_backend')

@section('content')
    <?php
    if($edit==0) {
        $name = '';
        $action = array('route'=>'categories.store','class'=>'form-horizontal','name'=>'edit');
    } elseif($edit ==1) {
        $id = $category_edit->id;
        $name = $category_edit->name;
        $action = array('route'=>['categories.update', $id],'method'=>'PUT','class'=>'form-horizontal','name'=>'edit');
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
                    <h5>Add New Category</h5>
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
                            <label>Category name</label>
                            {{Form::text('name',$name, array('type'=>'text',
                       'class'=>'form-control','placeholder'=>'Category Name', 'required'))}}
                            </div>
                        </div>
                        @if($edit==0)
                        {{ Form::button('Save category', array('class' => 'btn btn-primary','type'=>'submit')) }}
                        @elseif($edit==1)
                            {{ Form::button('Update category', array('class' => 'btn btn-primary','type'=>'submit')) }}
                            @endif
                        {{ Form::button('Cancel', array('class' => 'btn btn-default','type'=>'reset')) }}


                        {{Form::close()}}


                </div>
            </div>
        </div>

        <div class="span7">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                    <h5>Categories</h5>
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
                                <th>category name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if('category')
                                @forelse($categories as $category)
                            <tr>
                                <td class="taskDesc">{{$category->name}}</td>

                                @if($edit==0)
                                <td class="taskOptions">
                                    {!! Form::open(array('url'=>['categories', $category->id],'method'=>'PUT','style'=>'float:left')) !!}

                                    <a href="{{Route('categories.edit',$category->id)}}"  style="float:left" class="btn btn-sm btn-info">

                                        <i class="icon-edit"></i>
                                    </a>
                                        {{Form::open(array('route'=> ['categories.destroy', $category->id],'method'=>'delete','style'=>'float:left'))}}

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="icon-remove"></i>
                                        </button>
                                        {{Form::hidden('id',$category->id)}}
                                        {{Form::close()}}
                                </td>
                                    @elseif($edit==1)
                                    @endif
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
