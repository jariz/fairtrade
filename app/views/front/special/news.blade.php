@extends("front.templates.{$template}.layout")

@section('content')
   <div class="col-md-12">
        <div class="newsOverview col-md-8">
                                <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>

            <h2 class="title">Nieuws</h2>

            @if( !isset( $news ) or count($news) === 0 )
               <p>Er zijn geen nieuws berichten</p>
            @else
                @foreach( $news as $item )
                    <div class="newsBlock">
                        <img src="{{$item->thumbnail_url}}" alt="{{$item->title}}" class="floatLeft"/>
                        <div class="textAreaImg">
                            <h4><a href="{{$item->link}}">{{$item->title}}</a></h4>
                            <p class="date">12-05-2014</p>
                            <p>{{ $item->intro}}</p>
                            <a href="{{$item->link}}" title="Lees meer" class="readMore">Lees meer</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                @endforeach
                @if($archive)
                 {{ $news->links('pagination::simple') }}
                @endif
            @endif

            @if(!$archive)
            <a href="{{url('nieuws?archive=1')}}" class="nieuwsarchief">Nieuwsarchief</a>
            @endif
        </div>
        <div class="col-md-12 visible-md visible-sm visible-xs">
            <div class="border_horizontal"></div>
        </div>

        <div class="sidebar col-md-4">
            <h2 class="title">Over Fairtrade</h2>
            <div class="block">
                <h4><a href="" title="">Horeca grootste uitdaging</a></h4>
                <a href="" title=""><img src="images/imgSidebar.jpg" alt="" /></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur a. Duis tristique iaculis rhoncus.ec tincidunt fermentum. Vestibulum ante ...
                </p>
                <a href="" title="" class="readMore">Lees meer</a>
            </div>
        </div>
   </div>
   <div class="clear"></div>
@stop