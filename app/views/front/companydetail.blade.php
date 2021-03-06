@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="{{url('js/front/javascript.js')}}"></script>
@stop

@section('content')
    <div class="row">
        <div class="bedrijfprofiel col-md-8">
            <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
            <h2>{{ $company->name }}</h2>

            <div class="newsBlock">
                @if($company->photo)
                    <img src="{{ url('uploads/companies/'.$company->photo) }}" alt="" class="floatLeft"/>
                @endif
                <div class="textAreaImg">
                    <h4>{{ $company->name }}</h4>
                    @if(!empty($company->url))
                    <p class="bedrijfSite"><a href="{{ $company->url }}">{{ $company->url }}</a></p>
                    @endif
                    <div style="word-wrap: break-word;">
                        {{ $company->description }}
                        <a href="{{ URL::to($page->slug) }}" title="" class="nieuwsarchief">Terug naar bedrijven overzicht</a>
                    </div>
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
                    <img src="{{ asset('uploads/logos/t/'. $company->logo) }}" alt="{{ $company->name }}" />
                </div>
            @endif
        </div>
        <div class="sidebar bedrijfContact col-md-4">
            <h2 class="title">Contact</h2>
            <div class="block">
                <h4>Bedrijfsinformatie</h4>
                <p>
                    Adres: {{ $company->address }} <br />
                    Postcode: {{ $company->postal_code }}<br />
                    Stad: {{ $company->city }}
                </p>
               @if(!empty($company->business_hours))
                   <h4>Openings tijden</h4>
                   <p>{{ $company->business_hours }}</p>
               @endif
            </div>
        </div>
    </div>
@stop