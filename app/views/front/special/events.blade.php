@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
        <div class="col-lg-8">
           <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
            <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Evenementen
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>

            @if( !isset( $events ) or count($events) === 0 )
                           <p>Er zijn geen evenementen.</p>
                        @else
                        <ul class="media-list">
                            @foreach( $events as $item )

                                  <li class="media">

                                    <div class="media-body">
                                      <img src="{{url('images/test/test-news-thumbnail.jpg')}}" alt="{{$item->title}}" class="pull-left" style="margin-right:15px;margin-bottom:15px;"/>
                                      <h4 class="media-heading"><a href="{{$item->link}}">{{$item->title}}</a></h4>
                                      <p><i class="fa fa-calendar-o"></i> {{$item->date_formatted}}</p>
                                      <div class="textAreaimg"><p class="help-block">{{ $item->intro}}</p></div>
                                    </div>
                                  </li>

                            @endforeach
                             </ul>

                             {{ $events->links('pagination::simple') }}
                        @endif
        </div>    
        <div class="col-md-12 visible-md visible-sm visible-xs">
            <div class="border_horizontal"></div>
        </div>      
        <div class="sidebar col-md-4">
          <div class="col-md-12">
             <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                        <h2>
                           Bekijk afgelopen event
                        </h2>
                <span class="h2Right">
                  <img src="images/h2Right.png" alt="">
                </span>
              </span>
            <div class="block sideContent">
                <h4><a href="" title="">Fairtrade Fest</a></h4>
                <a href="" title=""><img src="images/imgSidebar.jpg" alt="" /></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur a. Duis tristique iaculis rhoncus.ec tincidunt fermentum. Vestibulum ante ...
                </p>
                <a href="" title="" class="readMore">Lees meer</a>
            </div>
          </div>
        </div>
    </div>
@stop