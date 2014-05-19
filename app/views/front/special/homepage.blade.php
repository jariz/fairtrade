@extends("front.templates.{$template}.layout")

@section('content')
<div class="wrapper">
    <div class="row sliderWrap">
        <div class="video">
            <h1>Ben jij al Fairtrade?</h1>

            <iframe width="375" height="211" src="//www.youtube.com/embed/OsRFTWLiP9g?list=PL2zniuqMzqkaURTd0uhm9iZqtBDkY7n5Y" frameborder="0" allowfullscreen></iframe>

            <div class="partner"><a href="">Word nu een partner</a></div>
        </div>
        <div class="col-md-12 slider"><img src="images/slider_visual.jpg" alt=""></div>
        <div class="col-md-12 slideOverlay"><img src="images/slider_overlay.png" alt=""></div>



    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>

        <h2 class="title">Uitgelicht</h2>

        <img src="images/imgNews.jpg" alt="" class="floatLeft"/>

        <div class="textAreaImg">
            <h3>Albert Heijn</h3>
            <h4>Amsterdam</h4>
            <h4>Langedijklaan 45, 1622ED</h4>
            <div class="link"><a href="">Ga naar de website</a></div>
        </div>

        <h5>Waarom zijn jullie Fairtrade geworden?</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.


        </p>
        <h5>Wat voor producten hebben jullie?</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <div class="border_horizontal"></div>

    </div>
    <div class="col-md-4">
        <h2 class="title">Nieuws</h2>
        <h3>Horeca grootste uitdaging</h3>
        <img src="images/imgSidebar.jpg" alt="" class="floatLeft"/>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
        </p>
        <div class="leesmeer"><a href="">Lees meer</a></div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 bedrijven">
        <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
        <h2 class="title">Bedrijven</h2>
        <a href=""><img src="images/albertHeijn.png" alt="" class="floatLeft"/></a>
        <a href=""><img src="images/wereldWinkel.png" alt="" class="floatLeft"/></a>
        <a href=""><img src="images/deliXl.png" alt="" class="floatLeft"/></a>
    </div>
    <div class="col-md-4">
        <div class="border_horizontal"></div>
        <h2 class="title">Nieuws</h2>
        <h3>Horeca grootste uitdaging</h3>
        <img src="images/imgSidebar.jpg" alt="" class="floatLeft"/>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
        </p>
        <div class="leesmeer"><a href="">Lees meer</a></div>
    </div>
</div>
@stop