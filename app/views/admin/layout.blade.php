<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}} - Fairtrade Amsterdam Beheer</title>
    <base href="{{URL::to('/')}}">
    <link href="{{url('plugins/font-awesome-4.0.3/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('plugins/bs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/admin/screen.css')}}" rel="stylesheet">
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/bs/bootstrap.min.js')}}"></script>

    @yield("scripts")
    <script src="{{url('js/admin.js')}}"></script>
</head>
<body>
@if(Auth::check())
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header container" style="margin: 0 auto;display: block;float: none;"> <!-- TODO deze navbar is gehacked nu, moet weer normaal worden gemaakt -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="{{URL::route('dashboard')}}">Fairtrade Beheer</a>
            </a>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <?php $admin_nav = Config::get("fairtrade.admin_nav");
                    $action = Route::getCurrentRoute()->getAction();
                    $curr_route = $action["as"]; ?>
                    @if( is_array($admin_nav ) )
                    @foreach($admin_nav as $label => $route)
                    @if(\Fairtrade\User::can($route))
                    <li
                    @if(substr($curr_route, 0, strlen($route)) == $route) class="active" @endif>
                    <a href="{{URL::route($route)}}">{{$label}}</a>
                    </li>
                    @endif
                    @endforeach
                    @endif

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="glyphicon glyphicon-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{URL::route('dashboard.settings')}}"><i
                                        class="glyphicon glyphicon-wrench"></i> Gebruiker instellingen </a></li>
                            <li><a href="{{URL::route('dashboard.logout', [Session::token()])}}"><i
                                        class="glyphicon glyphicon-log-out"></i> Uitloggen</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif
    @yield('content')
</body>
</html>