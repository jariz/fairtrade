@extends("front.templates.{$template}.layout")

@section('content')
   <div class="col-md-12">
        <div class="newsOverview col-md-8">
            <h2 class="title">Nieuws</h2>

            @if( !isset( $news ) or count($news) === 0 )
               <p>Er zijn geen nieuws berichten</p>
            @else
                @foreach( $news as $item )
                    <div class="newsBlock">
                        <img src="http://lorempixel.com/output/food-q-c-150-150-10.jpg" alt="" class="floatLeft"/>
                        <div class="textAreaImg">
                            <h4><a href="" title="">{{$item->title}}</a></h4>
                            <p class="date">12-05-2014</p>
                            <p>{{ $item->intro}}</p>
                            <a href="" title="Lees meer" class="readMore">Lees meer</a>
                        </div>
                        <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
                    </div>
                    <div class="clear"></div>
                @endforeach
                 {{ $news->links('pagination::simple') }}
            @endif

            <a href="" title="" class="nieuwsarchief">Nieuwsarchief</a>
        </div>
        <div class="col-md-12 visible-md visible-sm visible-xs">
            <div class="border_horizontal"></div>
        </div>
        <div class="sidebar col-md-4">
            <h2 class="title">Over Fairtrade</h1>
            <div class="block">
                <h4><a href="" title="">Horeca grootste uitdaging</a></h4>
                <a href="" title=""><img src="img/imgSidebar.jpg" alt="" /></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur a. Duis tristique iaculis rhoncus.ec tincidunt fermentum. Vestibulum ante ...
                </p>
                <a href="" title="" class="readMore">Lees meer</a>
            </div>
        </div>
   </div>
   <div class="clear"></div>
@stop