<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title or "GEEN TITEL"}} - Fairtrade Amsterdam</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('css/front/main.css')}}">
    <link rel="stylesheet" href="{{url('css/front/pages.css')}}">
    <link rel="stylesheet" href="{{url('plugins/bs/bootstrap.front.min.css')}}">
    <link href="{{url('plugins/font-awesome-4.0.3/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/bs/bootstrap.min.js')}}"></script>
    <script>
        var baseurl = "{{ URL::to('/') }}";
    </script>
    @yield('scripts')
</head>
<body id="bedrijven">
@include('front.templates.kelvin.nav')
<div class="container">
    @yield('content')
</div>
@include('front.templates.kelvin.footer')
</body>
</html>