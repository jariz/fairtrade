@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">
    {{Form::open(array('route'=>$post_route, 'class'=>'form-horizontal', 'files'=>true))}}
    @include('includes.errors')
    @if(!is_null($id))
    {{Form::hidden('id', $id)}}
    @endif
    @foreach($fields as $name => $field)
        @include('admin.crud.field')
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