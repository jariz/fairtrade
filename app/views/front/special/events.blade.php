@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row events">
        <div class="col-lg-12">
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
                                      @if(!empty($item->image))
                                      <img src="{{url('uploads/events/t/'.$item->image)}}" alt="{{$item->title}}" class="pull-left" style="margin-right:15px;margin-bottom:15px;"/>
                                      @endif
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
    </div>
@stop