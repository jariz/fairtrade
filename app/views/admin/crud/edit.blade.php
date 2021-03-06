@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">

    @if(\Fairtrade\User::can("{$route}-approve") && $editing && isset($data["accepted"]) && $data["accepted"] != 1)
    <div class="alert alert-warning">
        <h4><i class="glyphicon glyphicon-warning-sign"></i> Dit {{strtolower($singular)}} is nog niet goedgekeurd</h4>
        <p>Wilt u dit {{strtolower($singular)}} nu goedkeuren?</p>
            {{Form::open(['route'=>$route.'-approve'])}}
            {{Form::hidden('id', $id)}}
            <p style="margin-top:10px;">{{Form::submit("Goedkeuren", ["class"=>"btn btn-primary"])}}</p>
            {{Form::close()}}
    </div>
    @elseif(!\Fairtrade\User::can("{$route}-approve") && $editing && isset($data["accepted"]) && $data["accepted"] != 1)
    <div class="alert alert-warning">
        <h4><i class="glyphicon glyphicon-warning-sign"></i> Nog niet goedgekeurd</h4>
        <p>Dit {{strtolower($singular)}} is nog niet goedgekeurd. U zal moeten wachten totdat een beheerder dit doet.</p>
    </div>
    @endif

    {{Form::open(array('route'=>$post_route, 'class'=>'form-horizontal', 'files'=>true))}}
    <fieldset>
        <legend>{{$singular}} @if($editing) aanpassen @else aanmaken @endif</legend>
        @include('includes.errors')
        @if(!is_null($id))
        {{Form::hidden('id', $id)}}
        @endif
        @foreach($fields as $name => $field)
        @include('admin.crud.field')
        @endforeach
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Opslaan</button>
    </fieldset>
    {{Form::close()}}
</div>
@stop

@section('scripts')
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/bs-datepicker/locales/bootstrap-datetimepicker.nl.js')}}"></script>
<script src="{{url('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('plugins/bs-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<link rel="stylesheet" href="{{url('plugins/fancybox/jquery.fancybox.css?v=2.1.5')}}" type="text/css" media="screen" />
<script type="text/javascript" src="{{url('plugins/fancybox/jquery.fancybox.pack.js?v=2.1.5')}}"></script>
<link href="{{url('plugins/bs-datepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
<link href="{{url('plugins/spectrum/css/spectrum.css')}}" rel="stylesheet">
<script src="{{url('plugins/spectrum/js/spectrum.js')}}" type="text/javascript"></script>


<script>

(function($){
    $(document).ready(function() {

             if( $.isFunction( $.fn.datetimepicker ) ){

                $('.datepicker').datetimepicker({
                    language: "nl"
                });
            }

        $('.fancybox').fancybox();
        $('.color-picker').spectrum({
             preferredFormat: "hex",
             chooseText: "Kiezen",
             cancelText: "Annuleren"
        });
    })
})(jQuery);
</script>
@stop