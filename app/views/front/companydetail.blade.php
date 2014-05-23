@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="{{url('js/front/javascript.js')}}"></script>
@stop

@section('content')
    <div class="row">
        <div class="bedrijfprofiel col-md-8">
            <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
            <h2 class="title">{{ $company->name }}</h2>

            <div class="newsBlock">
                <img src="{{url('images/bigimg.jpg')}}" alt="" class="floatLeft"/>
                <div class="textAreaImg">
                    <h4>{{ $company->name }}</h4>
                    <p class="bedrijfSite"><a href="http://{{ $company->url }}">{{ $company->url }}</a></p>
                    <p>
                       {{ $company->description }}
                    </p>
                    <a href="" title="" class="nieuwsarchief">Terug naar nieuwsoverzicht</a>
                </div>
            </div>
            <div class="clear"></div>
            
        </div>
        <div class="col-md-12 visible-md visible-sm visible-xs">
            <div class="border_horizontal"></div>
        </div>
        <div class="sidebar bedrijfLogo col-md-4">
            <h2 class="title">Bedrijf</h2>
            @if ($company->logo != '')
                <div class="block">
                    <img src="{{ asset('uploads/logos/'. $company->logo) }}" alt="{{ $company->name }}">
                </div>
            @endif
        </div>
        <div class="sidebar bedrijfContact col-md-4">
            <h2 class="title">contact</h2>
            <div class="block">
                <h4><a href="" title="">Openings tijden</a></h4>
                <p>
                    adres : {{ $company->address }} <br />
                    postcode: 1234 AB<br />
                    stad: {{ $company->city }}<br /><br />
                    {{ $company->business_hours }}
                </p>
            </div>
        </div>
    </div>
@stop