@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
            <div class="col-lg-12">


                    <h1 class="media-heading">{{$item->title}}</h1>
                    @if( !$active )
                        <div class="alert alert-warning alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>Let op!</strong> dit evenement is helaas al geweest.
                        </div>
                    @endif
                    <div class="panel panel-default">
                      <div class="panel-heading">Info over dit evenement</div>
                      <div class="panel-body">

                            <p><i class="fa fa-calendar-o"></i> {{$item->date_formatted}}</p>
                            <p><i class="fa fa-dot-circle-o"></i> {{$item->location}}</p>
                        </ul>
                      </div>
                    </div>
                      <div class="panel panel-default">
                                          <div class="panel-heading">Beschrijving van dit evenement</div>
                                          <div class="panel-body">
                {{$item->description}}
                 </div>
                 </div>
           </div>

    </div>
@stop