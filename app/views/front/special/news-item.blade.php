@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
            <div class="col-lg-12">
                <div class="media">
                  <a class="pull-left" href="#">
                    <img class="media-object" src="..." alt="...">
                  </a>
                  <div class="media-body">
                    <h1 class="media-heading">{{$item->title}}</h1>
                  </div>
                </div>

                {{$item->content}}
           </div>

    </div>
@stop