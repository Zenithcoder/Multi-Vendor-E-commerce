@extends('backend.layout_backend')

@section('content')
    <?php
    if($edit==0) {
        $name = '';
        $value = '';
        $action = array('route'=>'attribute.store','class'=>'form-horizontal','name'=>'edit');
    } elseif($edit ==1) {
        $id = $attribute_edit->id;
        $name = $attribute_edit->name;
        $value = $attribute_edit->value;
        $value = unserialize($attribute_edit->value);
        foreach ($value as $val) {
            $result2[] = ltrim(rtrim($val," "));
        }
        $value = implode(' | ',$result2);

        $action = array('route'=>['attribute.update', $id],'method'=>'PUT','class'=>'form-horizontal','name'=>'edit');
    }
    ?>

    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">category</a> </div>
        <h1>Attribute</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span5">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                        <h5>Add New Attribute</h5>
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
                                <label>Attribute name</label>

                                {{Form::text('name',$name, array('type'=>'text',
                           'class'=>'form-control','placeholder'=>'Attribute Name', 'required'))}}
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-xs-9">
                                    <label>Value</label>

                                    {{Form::textarea('value',$value, array('type'=>'text',
                               'class'=>'form-control','placeholder'=>'Enter some text, or some attributes by "|" separating values.','rows'=>'2','cols'=>'3', 'required'))}}
                                </div>
                            </div>
                        {{ Form::button('Save attribute', array('class' => 'btn btn-primary','type'=>'submit')) }}
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
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if('attribute')
                                    @forelse($attribute as $attribute)
                                        <tr>
                                            <td class="taskDesc">{{$attribute->name}}</td>
                                            <td class="taskDesc">
                                                <?php
                                                    $value_serialize = $attribute->value;
                                                    $value_unserialize = unserialize($value_serialize);
                                                    foreach ($value_unserialize as $val) {
                                                        $result[] = ltrim(rtrim($val," "));
                                                    }
                                                    echo implode(', ',$result);
                                                    unseT($result);
                                                ?>
                                            </td>

                                            <td class="taskOptions">

                                                {!! Form::open(array('url'=>['attribute', $attribute->id],'method'=>'PUT','style'=>'float:left')) !!}
                                                {{Form::hidden('id',$attribute->id)}}

                                                {!! Form::close() !!}

                                                <a href="{{Route('attribute.edit',$attribute->id)}}"  style="float:left" class="btn btn-sm btn-info">

                                                    <i class="icon-edit"></i>
                                                </a>
                                                {{Form::open(array('route'=> ['attribute.destroy', $attribute->id],'method'=>'delete','style'=>'float:left'))}}

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                {{Form::hidden('id',$attribute->id)}}
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
