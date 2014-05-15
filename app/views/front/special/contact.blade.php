@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>Contact</h1>

            @include('includes.errors')

            @if( Session::has('success') )
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{Session::get('success')}}
                </div>
            @endif

            {{-- $dynamic or null --}}
            {{Form::open(['route' => 'contact', 'class' => 'form-horizontal'])}}
                <div class="form-group">
                    {{Form::label('name', 'Naam:', ['class' => 'control-label col-md-2'])}}
                    <div class="col-md-10">
                        {{Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Vul hier uw naam in'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('email', 'E-mailadres:', ['class' => 'control-label col-md-2'])}}
                    <div class="col-md-10">
                        {{Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Vul hier uw E-mailadres in'])}}
                    <p class="help-block"><i class="fa fa-info-circle"></i> Uw e-mailadres wordt alleen gebruikt om op uw bericht te antwoorden, en zal niet worden opgeslagen.</p>
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('subject', 'Onderwerp:', ['class' => 'control-label col-md-2'])}}
                    <div class="col-md-10">
                        {{Form::text('subject', Input::old('subject'), ['class' => 'form-control', 'placeholder' => 'Waar gaat uw vraag of bericht over?'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('message', 'Vraag of bericht:', ['class' => 'control-label col-md-2'])}}
                    <div class="col-md-10">
                        {{Form::textarea('message', Input::old('message'), ['class' => 'form-control', 'placeholder' => 'Hier kunt u uw bericht schrijven'])}}
                    </div>
                </div>


                <div class="form-group">

                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Verzenden</button>
                    </div>

                </div>
            {{Form::close()}}
        </div>
    </div>
@stop