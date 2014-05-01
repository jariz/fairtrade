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
            @elseif($field["type"] == "wysiwyg")
            {{Form::textarea($field["name"], $data[$field["name"]], array("class"=>"ckeditor"))}}
            @elseif($field["type"] == "file")
            {{Form::file($field["name"])}}
            @elseif($field["type"] == "date")
            <div class='input-group datepicker' data-date-format="DD-MM-YYYY HH:MM:SS">
                {{Form::text($field["name"], \Fairtrade\Date::input($data[$field["name"]])->forHuman(), array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </div>
            @elseif($field['type'] === 'text-with-prepend')
                <div class="input-group">
                  <span class="input-group-addon">{{$field['prepend']}}</span>
                  {{Form::text($field["name"], $data[$field["name"]], array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
                </div>
            @elseif($field['type'] === 'checkbox')
                <?php $checked = ( $data[ $field['name'] ] == 1) ? true : false ?>
               {{ Form::checkbox($field['name'], 1, $checked) }}
            @endif

        </div>
    </div>
    @endforeach
    <button type="submit" class="btn btn-success pull-right">Save</button>
    {{Form::close()}}
</div>
@stop

@section('scripts')
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/bs-datepicker/locales/bootstrap-datetimepicker.nl.js')}}"></script>
<script src="{{url('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('plugins/bs-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<link href="{{url('plugins/bs-datepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
@stop