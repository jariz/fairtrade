<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}} - Fairtrade Amsterdam</title>
    <link href="{{url('plugins/bs/bootstrap.min.css')}}" rel="stylesheet">
    @yield("scripts")
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>