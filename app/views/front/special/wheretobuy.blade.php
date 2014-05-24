@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="{{ URL::asset('js/front/javascript.js') }}"></script>
@stop

@section('content')
    <div class="wrapper" data-base="{{ URL::to('/') }}">
    </div>
    <div class="col-md-12 buurtWrap">
        <div class="col-md-3">
            <div class="border_vertical"></div> 
            <span class="h2Wrap">
                <span class="h2Left">
                    <img src="images/h2Left.png" alt="">
                </span>
                    <h2>
                       In de buurt
                    </h2>
                <span class="h2Right">
                   <img src="images/h2Right.png" alt="">
                </span>
            </span>

            <h3>Waar te koop</h3>
            Fairtrade producten kun je herkennen aan het Max Havelaar keurmerk. Stichting Max Havelaar is de initiator en eigenaar van het Fairtrade keurmerk in Nederland. </p><p>Het keurmerk is in Nederland te vinden op ruim 1.700 producten zoals koffie, thee, chocolade, ijs, bananen, bloemen en wijn die geleverd worden door ruim 140 bedrijven. </p><p>Fairtrade komt wereldwijd ten goede aan ruim 6 miljoen mensen in ontwikkelingslanden. Om armoede aan te pakken en boeren een eerlijke kans op ontwikkeling te geven, zijn er naast strenge sociale- en milieucriteria ook criteria opgenomen over de betaling aan boeren. Zo ontvangen zij minimaal een kostendekkende prijs en een extra premie.

        </div>

        <div class="col-md-9">
            <div class="maps">
                <div id="gmaps"></div>
            </div>



                <form class="form-inline" role="form" id="add_new_place_form">
                <div class="form-group">
                    <input type="text" name="place" id="add_place_input searchform" placeholder="Zoekbalk" class="form-control" autocomplete="off">
                    <input type="submit" value="Zoeken" class="btn btn-warning" id="add_place_button">
                    <h2>Categori&euml;</h2>
                    @if (isset($categories))
                        <ul>
                            @foreach ($categories as $category)
                                <li style="color:{{ $category->color }}">{{ link_to_route('wheretobuy.category', $category->name, $parameters = array('id' => $category->id), $attributes = array('style' => 'color: $category->color')); }}</li>
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
    <div class="col-md-12">
        <div class="border_horizontal"></div>
        <div class="col-md-12 bedrijvenmaps">
            <span class="h2Wrap">
                <span class="h2Left">
                    <img src="images/h2Left.png" alt="">
                </span>
                    <h2>
                       Bedrijven
                    </h2>
                <span class="h2Right">
                   <img src="images/h2Right.png" alt="">
                </span>
            </span>
            @if (isset($companies))
                @foreach ($companies as $company)
                     <a href="{{ URL::route('companydetail', $parameters = array('id' => $company->id), $absolute = true ) }}">
                        @if(isset($company->logo) && $company->logo != '')
                            <img src="{{ asset('uploads/logos/'. $company->logo) }}" class="bedrijvenlogo" alt="{{ $company->name }}" class="floatLeft"/>
                        @else
                            {{ $company->name }}
                        @endif
                     </a>
                @endforeach
            @endif
            <!--<a href=""><img src="img/albertHeijn.png" class="bedrijvenlogo" alt="" class="floatLeft"/></a>
            <a href=""><img src="img/wereldWinkel.png" class="bedrijvenlogo" alt="" class="floatLeft"/></a>
            <a href=""><img src="img/deliXl.png" alt="" class="bedrijvenlogo" class="floatLeft"/></a>
            <a href=""><img src="http://www.grabbits.nl/foto/Jumbo.gif" class="bedrijvenlogo" alt="" class="floatLeft"/></a>
            <a href=""><img src="http://www.plushensgens.nl/images/Plus-Logo.png" class="bedrijvenlogo" alt="" class="floatLef-->
        </div>
    </div>
@stop