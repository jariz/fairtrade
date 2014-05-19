@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
            <div class="col-lg-12">


                    <h1 class="media-heading">{{$item->title}}</h1>
                    <img class="media-object" src="{{$item->image_url}}" alt="...">

                {{$item->content}}
           </div>

    </div>
@stop