<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}} - Fairtrade Amsterdam Beheer</title>
    <link href="{{url('css/admin/screen.css')}}" rel="stylesheet">
    <link href="{{url('css/admin/bootstrap.min.css')}}" rel="stylesheet">
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
                    <a href="{{url('dashboard/users')}}">Gebruikers</a>
                </li>
                <li>
                    <a href="{{url('dashboard/users')}}">Gebruikers</a>
                </li>
                <li>
                    <a href="{{url('dashboard/users')}}">Gebruikers</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
</body>
</html>