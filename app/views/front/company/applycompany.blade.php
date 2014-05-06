@extends('front.layout')

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
<script src="js/front/javascript.js"></script>
@stop

@section('content')
	1: Account aanmaken - <strong>2: Bedrijfsgegevens</strong> - 3: Betalings gegevens
	<h1>Bedrijf aanmelden</h1>
	{{ Form::open(array('method' => 'post', 'action' => '\\Front\\Company@add', 'files' => true)) }}
		{{ Form::label('name', 'Bedrijfsnaam: ') }}
		{{ Form::text('name') }} <br />

		{{ Form::label('logo', 'Logo: ') }}
		{{ Form::file('logo') }} <br />

		{{ Form::label('address', 'Straat: ') }}
		{{ Form::text('address', null, array('class' => '')) }} <br />

		{{ Form::label('postal_code', 'Postcode: ') }}
		{{ Form::text('postal_code') }} <br />

		{{ Form::label('city', 'Woonplaats: ') }}
		{{ Form::text('city') }} <br />

		{{ Form::label('description', 'Beschrijving') }} <br />
		{{ Form::textarea('description') }} <br/ >

		<h2>Contact gegevens</h2>
		{{ Form::label('contact_info', 'Contact informatie:') }} <br />
		{{ Form::textarea('contact_info') }} <br />

		{{ Form::label('url', 'Website: ') }}
		{{ Form::text('url') }} <br />

		{{ Form::submit('Bedrijf aanmelden', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
@stop