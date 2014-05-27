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
                            <p class="date">{{$item->created_formatted}}</p>
                            <p>{{ $item->intro}}</p>
                            <a href="{{$item->link}}" title="Lees meer" class="readMore">Lees meer</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                @endforeach
                @if($archive)
                 {{ $news->appends(['archive' => 1])->links('pagination::simple') }}
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
             <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Over Fairtrade
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
            <div class="block">
                <h4><a href="" title="">{{$sidebar_heading or null}}</a></h4>

                <a href="" title=""><img src="images/imgSidebar.jpg" alt="" /></a>
                    {{$sidebar_description or null}}
                <a href="{{url('over-fairtrade')}}" title="" class="readMore">Lees meer</a>
            </div>
        </div>
   </div>
   <div class="clear"></div>
@stop