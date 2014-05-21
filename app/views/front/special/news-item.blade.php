@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row ">
            <div class="col-md-12">
				<div class="col-md-12 newsItem">
<img class="media-object" src="{{$item->image_url}}" alt="...">
                    <h1 class="media-heading">{{$item->title}}</h1>
                    
                <div class="newsDetail">
                	{{$item->content}}
                </div>
                </div>
                <div class="clear"></div>
           </div>

    </div>
@stop