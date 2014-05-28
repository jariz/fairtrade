@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
<script src="js/front/javascript.js"></script>
@stop

@section('content')
	1: Account aanmaken - 2: Bedrijfsgegevens - <strong>3: Aanmelden afronden</strong>
    <h1>Bedankt voor uw aanmelding</h1>
    <p>Bedankt voor het aanmelden van uw bedrijf, wij zullen uw aanmelding beoordelen en wanneer deze is goedgekeurd weergeven op de website.<p>
@stop