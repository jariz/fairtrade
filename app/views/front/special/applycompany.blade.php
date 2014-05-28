@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="js/front/javascript.js"></script>
@stop

@section('content')
	1: Account aanmaken - <strong>2: Bedrijfsgegevens</strong> - 3: Aanmelden afronden
	<h1>Bedrijf aanmelden</h1>
	@include('includes.errors')

	{{ Form::open(array('method' => 'post', 'action' => '\\Front\\Company@add', 'files' => true)) }}
        <div class="form-group">
		    {{ Form::label('name', 'Bedrijfsnaam: ') }}
		    {{ Form::text('name', NULL, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
		    {{ Form::label('logo', 'Logo: ') }}
		    {{ Form::file('logo', NULL, array('class' => 'form-control')) }}
		</div>
        <div class="form-group">
		    {{ Form::label('photo', 'Header afbeelding: ') }}
		    {{ Form::file('photo', NULL, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		    {{ Form::label('category', 'Categorie: ') }}
		    {{ Form::select('category', $categories, NULL, array('class' => 'form-control')) }}
		</div>
        <div class="form-group">
		    {{ Form::label('address', 'Straat: ') }}
		    {{ Form::text('address', NULL, array('class' => 'form-control')) }} <br />
        </div>
        <div class="form-group">
		    {{ Form::label('postal_code', 'Postcode: ') }}
		    {{ Form::text('postal_code', NULL, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
		    {{ Form::label('city', 'Woonplaats: ') }}
		    {{ Form::text('city', NULL, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
		    {{ Form::label('description', 'Beschrijving') }} <br />
		    {{ Form::textarea('description', NULL, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
		    {{ Form::label('business_hours', 'Openingstijden') }} <br />
		    {{ Form::textarea('business_hours', NULL, array('class' => 'form-control')) }}
        </div>
		<h2>Contact gegevens</h2>
		<div class="form-group">
		    {{ Form::label('contact_info', 'Contact informatie:') }} <br />
		    {{ Form::textarea('contact_info', NULL, array('class' => 'form-control')) }}
        </div>
		<div class="form-group">
		    {{ Form::label('url', 'Website: ') }}
		    {{ Form::text('url', NULL, array('class' => 'form-control')) }}
        </div>
		{{ Form::submit('Bedrijf aanmelden', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
@stop