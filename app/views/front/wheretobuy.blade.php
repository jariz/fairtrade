@extends('front.layout')

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
<script src="js/front/javascript.js"></script>
@stop

@section('content')
	<div id="gmaps"></div>
	<form action="" method="" id="add_new_place_form">
		Zoek: <input type="text" name="place" id="add_place_input" placeholder="Geef een locatie op" autocomplete="off">
		<input type="submit" value="Zoeken" id="add_place_button">
	</form>

    <h1>Alle bedrijven</h1>
    <table id="all_companies">
	    @foreach ($companies as $company)
	    	<tr>
	        	<td data-geo-location="{{ $company->geo_location }}">{{ $company->name }}</td>
	        </tr>
	    @endforeach
    </table>
@stop