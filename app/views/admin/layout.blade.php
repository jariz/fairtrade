<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}} - Fairtrade Amsterdam Beheer</title>
    <link href="{{url('plugins/bs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/admin/screen.css')}}" rel="stylesheet">
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/bs/bootstrap.min.js')}}"></script>

    @yield("scripts")
    <script src="{{url('js/admin.js')}}"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="{{URL::route('dashboard')}}">Fairtrade Beheer</a>
            <ul class="nav navbar-nav pull-right">
                
              <?php $admin_nav = Config::get("fairtrade.admin_nav"); ?>
                @if( is_array($admin_nav ) )
                    @foreach($admin_nav as $label => $route)
                    <li @if(Route::getCurrentRoute()->getAction()["as"] == $route) class="active" @endif>
                        <a href="{{URL::route($route)}}">{{$label}}</a>
                    </li>
                    @endforeach
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->email}} <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::route('dashboard.logout', [Session::token()])}}"><i class="glyphicon glyphicon-log-out"></i> Uitloggen</a></li>
                        <li><a href="{{URL::route('dashboard.settings')}}"><i class="glyphicon glyphicon-wrench"></i> Gebruiker instellingen </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
</body>
</html>