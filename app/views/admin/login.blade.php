<!DOCTYPE html>
<html>
<head>
    <title>Fairtrade - Login</title>
    <link href="{{url('css/admin/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/admin/screen.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="panel panel-warning panel-login">
        <div class="panel-heading">
            Fairtrade - Login
        </div>
        <div class="panel-body">

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{Form::open(array('route'=>'dashboard.do-login', 'class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label("email", "E-mail", array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text("email", Input::get("email"), array("class"=>"form-control", "id"=>"email", "placeholder"=>"E-mail"))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label("password", "Wachtwoord", array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::password("password", array("class"=>"form-control", "id"=>"password", "placeholder"=>"Wachtwoord"))}}
                </div>
            </div>
            <button type="submit" class="btn btn-success pull-right">Log in</button>
            {{Form::close()}}
        </div>
    </div>
</div>
</body>
</html>