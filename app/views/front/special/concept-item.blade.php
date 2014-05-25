@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
                <div class="col-lg-8">

                    @if(!empty($item->image))
                    <img src="{{$item->image}}" class="img-thumbnail float-left" style="margin-right:15px; margin-bottom: 15px;">
                    @endif
                        <h1 class="media-heading">{{$item->title}}</h1>


                        {{$item->content}}
               </div>

               <div class="col-lg-4">
                  <h2>Auteur</h2>

                  @if( isset($item->company) )
                  <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object" src="{{$item->company->thumbnail_url}}" alt="{{$item->company->name}}">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">{{$item->company->name}} </h4>
                      <p><a href="{{URL::to('waartekoop/bedrijf/'.$item->company->id)}}" class="btn btn-primary">
                        Bedrijfspagina bekijken
                      </a>
                      </p>
                    </div>
                  </div>
                  @else
                    <p><strong>Auteur niet gevonden</strong></p>
                  @endif
               </div>

        </div>
@stop