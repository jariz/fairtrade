<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title or "GEEN TITEL"}} - Fairtrade Amsterdam</title>
    <meta name="keywords" content="fairtrade,eerlijk,fair,amsterdam,fairtrade gemeente,koffie,muncipality">
    <meta name="description" content="Fairtrade Amsterdam gaat Amsterdam Fairtrade maken, doet u mee?">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('css/front/main.css')}}">
    <link rel="stylesheet" href="{{url('css/front/pages.css')}}">
    <link rel="stylesheet" href="{{url('plugins/bs/bootstrap.front.min.css')}}">
    <link href="{{url('plugins/font-awesome-4.0.3/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Open graph metadata -->
    <meta property="og:title" content="{{$title or 'Fairtrade Amsterdam'}}"/>
    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:image" content="{{url('images/logo.png')}}"/>
    <meta property="og:site_name" content="Fairtrade Amsterdam"/>
    <meta property="og:description" content="Fairtrade Amsterdam gaat Amsterdam Fairtrade maken, doet u mee?"/>
    <meta property="og:type" content="website"/>

    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/bs/bootstrap.min.js')}}"></script>
    <script>


        var baseurl = "{{ URL::to('/') }}";

        @if( $popup )
        (function($){
        $(function(){
            if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('#app-popup').modal();

                // Makes sure the popup won't be show again next time
                $.ajax({
                    url: baseurl+'/hide-popup',
                    type: 'POST'
                });
            }
        });
        })(jQuery);
        @endif
    </script>
    @yield('scripts')
</head>
<body id="bedrijven">

<div id="app-popup" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Hallo mobiele gebruiker!</h4>
      </div>
      <div class="modal-body">
        <p>Ons systeem heeft gedecteerd dat u onze site bezoekt via uw mobiele telefoon. Wij hebben een speciale applicatie ontwikkeld voor mobiele telefoons </p>
        <p>Deze applicatie is te vinden via de volgende link: </p>
        <div class="well well-sm">m.fairtradeamsterdam.nl</div>
        <p><strong>Let op: </strong> Deze melding wordt niet nogmaals weergeven</strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
        <a href="http://m.fairtradeamsterdam.nl/" type="button" class="btn btn-primary">Open de app</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('front.templates.kelvin.nav')
<div class="container">
@if( Auth::guest() && !Request::is('/') && !Request::is('home') )
<div class="panel panel-default">
  <div class="panel-body text-center">
    <p>Heeft u een eigen onderneming? Wordt vandaag nog partner, en geef boeren in Afrika hoop!</p>

    <p><a id="partner-btn" href="{{URL::route('applyCompany')}}" class="btn btn-success">Partner worden <i class="fa fa-users"></i></a></p>
  </div>
</div>
@endif
    @yield('content')
</div>
@include('front.templates.kelvin.footer')
</body>
</html>