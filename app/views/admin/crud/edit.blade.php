@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">
    {{Form::open(array('route'=>$post_route, 'class'=>'form-horizontal'))}}
    @include('includes.errors')
    @if(!is_null($id))
    {{Form::hidden('id', $id)}}
    @endif
    @foreach($fields as $name => $field)
    <div class="form-group">
        {{Form::label($field["name"], $name, array('class'=>'col-sm-2 control-label'))}}
        <div class="col-sm-10">
            @if($field["type"] == "text")
            {{Form::text($field["name"], $data[$field["name"]], array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
            @elseif($field["type"] == "password")
            {{Form::password($field["name"], array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
            @if(!is_null($id))<span class="text-info">Laat dit veld leeg om het wachtwoord niet te veranderen</span>@endif
            @elseif($field["type"] == "radio")
            @foreach($field["options"] as $option => $value)
            <p>
            {{Form::radio($field["name"], $value, $data[$field["name"]] == $value, array("id"=>$field["name"]."_".$value))}}
            {{Form::label($field["name"]."_".$value, $option)}}
            </p>
            @endforeach
            @endif
        </div>
    </div>
    @endforeach
    <button type="submit" class="btn btn-success pull-right">Save</button>
    {{Form::close()}}
</div>
@stop