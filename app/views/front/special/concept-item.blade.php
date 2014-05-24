@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
                <div class="col-lg-12">

                    @if(!empty($item->image))
                    <img src="{{$item->image}}" class="img-thumbnail float-left" style="margin-right:15px; margin-bottom: 15px;">
                    @endif
                        <h1 class="media-heading">{{$item->title}}</h1>


                        {{$item->content}}
               </div>

        </div>
@stop