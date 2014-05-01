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
                <li>
                    <a href="{{url('dashboard/users')}}">Gebruikers</a>
                </li>
                <li>
                    <a href="{{url('dashboard/news')}}">Nieuws</a>
                </li>
                <li>
                    <a href="{{url('dashboard/events')}}">Evenementen</a>
                </li>
                <li>
                    <a href="{{url('dashboard/concepts')}}">Concepten</a>
                </li>
                <li>
                    <a href="{{url('dashboard/pages')}}">Pagina's</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
</body>
</html>