@extends("front.templates.{$template}.layout")

@section('content')
<div class="wrapper">
    <div class="row sliderWrap">
        <div class="video">
            <h1>Ben jij al Fairtrade?</h1>

            <iframe width="375" height="211"
                    src="//www.youtube.com/embed/OsRFTWLiP9g?list=PL2zniuqMzqkaURTd0uhm9iZqtBDkY7n5Y" frameborder="0"
                    allowfullscreen></iframe>

            <div class="partner"><a href="{{ URL::to('bedrijf-aanmelden') }}">Word nu een partner</a></div>
        </div>
        <div class="col-md-12 slider"><img src="images/slider_visual.jpg" alt=""></div>
        <div class="col-md-12 slideOverlay"><img src="images/slider_overlay.png" alt=""></div>


    </div>
</div>
<div class="row">
    <div class="col-md-8">
<!--        <div class="border_vertical hidden-md hidden-sm hidden-xs" style="height:200px;"></div>-->

        <div style="min-height: 170px;">
            @if($featured)
            <h2 class="title">Uitgelicht</h2>

            <img
                src="{{$featured->company->logo ? url('uploads/logos/'.$featured->company->logo) : 'http://placehold.it/220x230'}}"
                alt="" class="pull-left giev-padding"/>


            <h3>{{{$featured->company->name}}}</h3>
            <h4>{{{$featured->company->city}}}</h4>
            <h4>{{{$featured->company->adres}}}</h4>
            {{$featured->content}}
        </div>

<!--        @if($featured->company->website)-->
<!--        <div class="link"><a href="{{{$featured->company->website}}}">Ga naar de website</a></div>-->
<!--        @endif-->



        <h2 class="title">Bedrijven</h2>
        <div style="text-align: center">
            @foreach($companies as $company)
            <a href=""><img src="images/albertHeijn.png" alt="" class="floatLeft"/></a>
            @endforeach
        </div>
        <div class="border_horizontal" style="top:190px;position: absolute;margin:0;"></div>
        @endif
    </div>
    <div class="col-md-4">
        <h2 class="title">Nieuws</h2>
        @foreach($news as $post)
        <h3>{{{$post->title}}}</h3>

        <p>
            {{$post->content}}
        </p>

        <div class="leesmeer"><a href="">Lees meer</a></div>
        @endforeach
    </div>
</div>
@stop