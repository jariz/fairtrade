<!DOCTYPE html>
<html>
<head>
    <title>Login - Fairtrade Amsterdam</title>
    <link href="{{url('plugins/bs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/admin/screen.css')}}" rel="stylesheet">
</head>
<body>
<div class="container container-login">
    <img src="{{url('images/logo.png')}}" style="margin-bottom: 20px;">
    <div class="panel panel-primary panel-login">
        <div class="panel-heading">
            Fairtrade Amsterdam - Login
        </div>
        <div class="panel-body">
            @if(Session::has("relogin"))
            <div class="alert alert-success">
                <h4>Log opnieuw in</h4>
                Uw nieuwe gebruikersinstellingen zijn succesvol opgeslagen.<br>
                Log aub opnieuw in met deze nieuwe gegevens
            </div>
            @endif
            @include('includes.errors')

            {{Form::open(array('route'=>'dashboard.do-login', 'class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label("email", "E-mail", array('class'=>'col-sm-3 control-label'))}}
                <div class="col-sm-9">
                    {{Form::text("email", Input::get("email"), array("class"=>"form-control", "id"=>"email", "placeholder"=>"E-mail"))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label("password", "Wachtwoord", array('class'=>'col-sm-3 control-label'))}}
                <div class="col-sm-9">
                    {{Form::password("password", array("class"=>"form-control", "id"=>"password", "placeholder"=>"Wachtwoord"))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('remember-me', 'Ingelogd blijven', ['class' => 'col-sm-3 control-label'])}}
                <div class="col-sm-9">
                    <input type="checkbox" name="remember-me" value="1" id="remember-me"/>
                </div>
            </div>
            <button type="submit" class="btn btn-success pull-right">Log in</button>
            {{Form::close()}}
        </div>
    </div>
</div>
</body>
</html>