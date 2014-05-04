@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">
    {{Form::open(array("autocomplete"=>"off","class"=>"form-horizontal", "route"=>"dashboard.do-settings"))}}
    @include('includes.errors')
        <fieldset>
            <legend>Gebruikersinstellingen</legend>
            <div class="form-group">
                {{Form::label("email", "Email", array("class"=>"col-lg-2 control-label"))}}
                <div class="col-lg-10">
                    {{Form::text("email", @$data["email"], array("autocomplete"=>"off","class"=>"form-control","placeholder"=>"Email"))}}
                </div>
            </div>

            <div class="form-group">
                {{Form::label("new_password", "Nieuw wachtwoord", array("class"=>"col-lg-2 control-label"))}}
                <div class="col-lg-10">
                    {{Form::password("new_password", array("autocomplete"=>"off","class"=>"form-control","placeholder"=>"Nieuw wachtwoord"))}}
                    <span class="text-info"><br><i class="glyphicon glyphicon-info-sign"></i> Laat dit veld leeg als u uw wachtwoord niet wilt veranderen</span>
                </div>
            </div>

            <div class="form-group">
                {{Form::label("new_password_confirm", "Nieuw wachtwoord (herhalen)", array("class"=>"col-lg-2 control-label"))}}
                <div class="col-lg-10">
                    {{Form::password("new_password_confirm", array("autocomplete"=>"off","class"=>"form-control","placeholder"=>"Nieuw wachtwoord (herhalen)"))}}
                </div>
            </div>

            <legend style="padding-top:10px;">Verificatie</legend>
            <div class="form-group">
                {{Form::label("current_password", "Huidig wachtwoord", array("class"=>"col-lg-2 control-label"))}}
                <div class="col-lg-10">
                    {{Form::password("current_password", array("autocomplete"=>"off","class"=>"form-control","placeholder"=>"Huidig wachtwoord"))}}
                </div>
            </div>
        </fieldset>
    <button type="submit" class="btn btn-success pull-right btn-lg">Opslaan</button>
    {{Form::close()}}
</div>
@stop