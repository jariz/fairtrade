@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="{{ URL::asset('js/front/javascript.js') }}"></script>
@stop

@section('content')
    <div class="wrapper"></div>
    <div class="col-md-12 buurtWrap">
        <div class="col-md-3">
            <div class="border_vertical"></div> 
            <span class="h2Wrap">
                <span class="h2Left">
                    <img src="{{ URL::asset("images/h2Left.png") }}" alt="">
                </span>
                <h2>In de buurt</h2>
                <span class="h2Right">
                   <img src="{{ URL::asset("images/h2Right.png") }}" alt="">
                </span>
            </span>

            <h3>{{$heading or null}}</h3>
           {{$description or null}}
        </div>

        <div class="col-md-9">
            <h1><i class="fa fa-map-marker"></i> {{$query_heading}}</h1>

            <div class="maps">
                <div id="gmaps" data-category="{{ $category_id }}"></div>
            </div>
             @if( $filterd )
                <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Let op!</strong> de resultaten op de kaart zijn gefilterd op categorie.
                  <p><a href="{{URL::to($page->slug)}}" class="btn btn-default">Alle bedrijven weergeven</a></p>
                </div>
             @endif


                <form role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                <input type="text" name="place" id="searchform" placeholder="Zoek op adres of bedrijfsnaam" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                                <input type="submit" value="Zoeken" class="btn btn-warning" id="add_place_button">
                            </div>
                        </div>
                    </div>
                </form>
            <div class="form-group">
                <h2>Categori&euml;</h2>
                @if (isset($categories))
                    <ul>
                        @foreach ($categories as $category)
                            <li style="color:{{ $category->color }}"><a href="{{ URL::to($page->slug.'/categorie/'.$category->id); }}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <!--
        <a href=""><img class="iosapp" src="img/iosapp.png" alt="ios app"></a>
        <a href=""><img class="androidapp" src="img/androidapp.png" alt="ios app"></a>
        -->
    </div>
    <div id="bedrijven-lijst" class="col-md-12">
        <div class="border_horizontal"></div>
        <div class="col-md-12 bedrijvenmaps">
            <span class="h2Wrap">
                <span class="h2Left">
                    <img src="{{ URL::asset("images/h2Left.png") }}" alt="">
                </span>
                <h2>Bedrijven</h2>
                <span class="h2Right">
                   <img src="{{ URL::asset("images/h2Right.png") }}" alt="">
                </span>
            </span>
            @if( $filterd)
                <p>Alle bedrijven die vallen onder de categrie <strong>{{$categoryz->name}}</strong></p>
            @endif
            <div class="row">
            @if (isset($companies))
                <?php $i = 0; ?>
                @foreach ($companies as $company)
                <?php $i++; ?>
                <div class="col-lg-2">
                     <a href="{{ URL::to($page->slug.'/bedrijf/'. $company->id)  }}">
                        @if(isset($company->logo) && $company->logo != '')
                            <img src="{{ asset('uploads/logos/t/'. $company->logo) }}" alt="{{ $company->name }}" style="margin-right:10px; margin-bottom: 10px" />
                        @else
                            {{ $company->name }}
                        @endif
                     </a>
                </div>
                @if($i > 4)
                <?php $i = 0; ?>
                </div>
                <div class="row">
                @endif
                @endforeach
            @endif
            </div>
            <center>{{ $companies->fragment('bedrijven-lijst')->links() }}</center>
        </div>
    </div>
@stop