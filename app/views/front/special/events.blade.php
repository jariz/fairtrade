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
                                    <a class="pull-left" href="#">
                                      <img class="media-object" src="http://lorempixel.com/output/food-q-c-150-150-10.jpg" alt="{{$item->title}}">
                                    </a>
                                    <div class="media-body">
                                      <h4 class="media-heading">{{$item->title}}</h4>
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