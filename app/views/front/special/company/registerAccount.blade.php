@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
<script src="js/front/javascript.js"></script>
@stop

@section('content')
	<strong>1: Account aanmaken</strong> - 2: Bedrijfsgegevens - 3: Betalings gegevens
<h1>Account aanmaken</h1>
@include('includes.errors')

{{ Form::open(array('method' => 'post', 'action' => '\\Front\\Company@registerUser', 'files' => true)) }}
    <div class="form-group">
        {{ Form::label('email', 'E-mail: ') }}
        {{ Form::email('email', NULL, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Wachtwoord: ') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Naam: ') }}
         {{ Form::text('name', NULL, array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Bedrijf aanmelden', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop