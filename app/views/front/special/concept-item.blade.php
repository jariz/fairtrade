@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
                <div class="col-lg-12">


                        <h1 class="media-heading">{{$item->title}}</h1>


                        {{$item->content}}
               </div>

        </div>
@stop