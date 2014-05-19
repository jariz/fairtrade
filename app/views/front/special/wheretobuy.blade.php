@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="{{ URL::asset('js/front/javascript.js') }}"></script>
@stop

@section('content')
    <div class="wrapper" data-base="{{ URL::to('/') }}">
        <div class="border_horizontal"></div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="border_vertical"></div>
            <h2 class="title">In de buurt</h2>

            <h3>Ben jij al Fairtrade?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
            <p> quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class="col-md-9">
            <div class="maps">
                <div id="gmaps"></div>
            </div>

        <form class="form-inline" role="form" id="add_new_place_form">
            <div class="form-group">
                <input type="text" name="place" id="add_place_input searchform" placeholder="Zoekbalk" class="form-control" autocomplete="off">
                <input style="margin-top: 10px;" type="submit" value="Zoeken" class="btn btn-warning" id="add_place_button">
                <h2>Categori&euml;</h2>
                @if (isset($categories))
                    <ul>
                        @foreach ($categories as $category)
                           <li>{{ link_to_route('wheretobuy.category', $category->name, $parameters = array('id' => $category->id), $attributes = array()); }}</li>
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
    <div class="border_horizontal"></div>
    <div class="row">
        <div class="col-md-12 bedrijvenmaps">
            <h2 class="title">Bedrijven</h2>
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