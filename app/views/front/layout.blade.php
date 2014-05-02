<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}} - Fairtrade Amsterdam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('plugins/bs/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    @yield("scripts")
</head>
<body>
    @include('front.nav')
    <div class="container">
        @yield('content')
    </div>
    <script src="{{url('plugins/bs/bootstrap.min.js')}}"></script>
</body>
</html>
