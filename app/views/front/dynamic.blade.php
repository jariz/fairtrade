@extends('front.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($page->published == 0)
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <span class="glyphicon glyphicon-exclamation-sign"></span>
                  <strong>Let op: </strong> Deze pagina is niet gepubliceerd, en is daarom niet zichtbaar voor bezoekers
                </div>
            @endif

            <h1>{{$page->title}}</h1>
            {{$page->content}}
        </div>
    </div>
@stop