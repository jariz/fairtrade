@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>Evenementen</h1>
            @if( !isset( $events ) or count($events) === 0 )
                           <p>Er zijn geen evenementen.</p>
                        @else
                        <ul class="media-list">
                            @foreach( $events as $item )

                                  <li class="media">

                                    <div class="media-body">
                                      <h4 class="media-heading"><a href="{{$item->link}}">{{$item->title}}</a></h4>
                                      <p><i class="fa fa-calendar-o"></i> {{$item->date_formatted}}</p>
                                      <p class="help-block">{{ $item->intro}}</p>
                                    </div>
                                  </li>

                            @endforeach
                             </ul>

                             {{ $events->links('pagination::simple') }}
                        @endif

        </div>
    </div>
@stop