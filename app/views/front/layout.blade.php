<!DOCTYPE html>
<html>
<head lang="nl">
    <meta charset="UTF-8">
    <title>{{$title}} - Fairtrade Amsterdam</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('plugins/bs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/front/normalize.css')}}" rel="stylesheet">
    <link href="{{url('css/front/style.css')}}" rel="stylesheet">
    <link href="{{url('css/front/main.css')}}" rel="stylesheet">
    @yield("scripts")
</head>
	<body>
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	    <div class="header">
		    <!-- LOGO -->
		    <div class="logo">
		        <a href="{{url('/')}}">
		            <img src="images/logo.png" alt="Logo Fairtrade Amsterdam">
		        </a>
		    </div>
	            
	        <!-- MENU -->
	        @include('front.nav')

	    </div>

	    <div class="container">
	        @yield('content')
	    </div>

	    <!-- FOOTER -->
	    <div class="footer">
	        <div class="inner-footer">
	            <div class="logo_footer">
	                <a href="{{url('/')}}">
	                    <img src="images/logo.png" alt="Logo Fairtrade Amsterdam">
	                </a>
	            </div>
	            <div class="footer_content">
	                <div class="social">
	                    <ul>
	                        <li class="fb"><a href="#">Help en deel</a></li>
	                        <li class="doneer"><a href="#">Doneer aan Fairtrade Amsterdam</a></li>
	                    </ul>
	                </div>
	                <div class="footer_nav">
	                    <ul>
	                        <li><a href="#">Algemene voorwaarden</a></li>
	                        <li><a href="#">Sitemap</a></li>
	                        <li><a href="{{URL::to('dashboard')}}">Inloggen</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>

	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	    <script src="{{url('plugins/bs/bootstrap.min.js')}}"></script>
	    <script src="{{url('js/front/modernizr-2.6.2.min.js')}}"></script>
    </body>
</html>