@extends('backend.layout_backend')

@section('content')
    <?php
    if($edit==0) {
        $name = '';
        $action = array('route'=>'attribute_set.store','class'=>'form-horizontal','name'=>'edit');
    } elseif($edit ==1) {
        $id = $attributeSet_edit->id;
        $name = $attributeSet_edit->name;
        $action = array('route'=>['attribute_set.update', $id],'method'=>'PUT','class'=>'form-horizontal','name'=>'edit');
    }
    ?>

    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Attribute set</a> </div>
        <h1>Attribute set</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span5">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                        <h5>Add New attribute set</h5>
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
                                <label>attribute set name</label>

                                {{Form::text('name',$name, array('type'=>'text',
                           'class'=>'form-control','placeholder'=>'attribute set Name', 'required'))}}
                            </div>
                        </div>

                            {{--<div class="form-group">--}}
                                <div class="form-group" >
                                    <div class="col-xs-10">
                                    <label>Select attribute</label>
                                        <select multiple placeholder="Select Attributes" name="attribute[]">

                                            <?php
                                            if($edit == 1) {
                                                foreach(unserialize($attributeSet_edit->value) as $attribute_set_val) {
                                                    foreach($attribute as $value) {
                                                        if($attribute_set_val == $value->id) {
                                                            echo "<option value='{$value->id}' selected>{{$value->name}}</option>";
                                                        }
                                                        elseif($attribute_set_val != $value->id) {

                                                            echo "<option value='{$value->id}'>{{$value->name}}</option>";
                                                        }
                                                    }
                                                }
                                            } else{
                                                foreach ($attribute as $val) {
                                                    echo "<option value='{$val->id}'>{{$val->name}}</option>";
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                        {{ Form::button('Save attribute set', array('class' => 'btn btn-primary','type'=>'submit')) }}
                        {{ Form::button('Cancel', array('class' => 'btn btn-default','type'=>'reset')) }}


                        {{Form::close()}}


                    </div>
                </div>
            </div>

            <div class="span7">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>Attribute set</h5>
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
                                    <th>Attribute set name</th>
                                    <th>Attribute name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if('attribute_set')
                                    @forelse($attributeSet as $attributeSet)
                                        <tr>
                                            <td class="taskDesc">{{$attributeSet->name}}</td>
                                            <td class="taskDesc">
                                                <?php
                                                foreach (unserialize($attributeSet->value) as $att_id)
                                                    {
                                                        foreach ($attribute as $value) {
                                                            if($value->id == $att_id) {
                                                                $result[] = $value->name;
                                                            }
                                                        }
                                                    }
                                                echo implode(', ',$result);
                                                unseT($result);

                                                ?>
                                            </td>

                                            <td class="taskOptions">

                                                {!! Form::open(array('url'=>['attribute_set', $attributeSet->id],'method'=>'PUT','style'=>'float:left')) !!}
                                                {{Form::hidden('id',$attributeSet->id)}}

                                                {!! Form::close() !!}

                                                <a href="{{Route('attribute_set.edit',$attributeSet->id)}}"  style="float:left" class="btn btn-sm btn-info">

                                                    <i class="icon-edit"></i>
                                                </a>
                                                {{Form::open(array('route'=> ['attribute_set.destroy', $attributeSet->id],'method'=>'delete','style'=>'float:left'))}}

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                {{Form::hidden('id',$attributeSet->id)}}
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
