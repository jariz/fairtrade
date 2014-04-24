@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">
    {{Form::open(array('route'=>$post_route, 'class'=>'form-horizontal'))}}
    @include('includes.errors')
    @foreach($fields as $name => $field)
    <div class="form-group">
        {{Form::label($field["name"], $name, array('class'=>'col-sm-2 control-label'))}}
        <div class="col-sm-10">
            {{Form::text($name, Input::get($field["name"]), array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
        </div>
    </div>
    @endforeach
    <button type="submit" class="btn btn-success pull-right">Save</button>
    {{Form::close()}}
</div>
@stop