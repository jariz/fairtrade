@extends("front.templates.{$template}.layout")

@section('content')
<div class="wrapper">
    <div class="row sliderWrap">
        <div class="col-md-12 slider"><img src="images/slider_visual.jpg" alt=""></div>
        <div class="col-md-12 slideOverlay"><img src="images/slider_overlay.png" alt="">

            <div class="video">
                <h1>Ben jij al Fairtrade?</h1>

                <div class="video-container">
                    <iframe width="375" height="211"
                            src="{{$youtube_video}}"
                            frameborder="0"
                            allowfullscreen></iframe>
                </div>

                <div class="partner"><a href="{{ URL::to('bedrijf-aanmelden') }}">Word nu een partner</a></div>
            </div>
        </div>


    </div>
    <div class="clear"></div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="col-md-12">
             <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Nieuws
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
            @foreach($news as $post)
            <div class="homeNewsItem">
                <h3>{{{$post->title}}}</h3>

                <p>
                    {{$post->intro}}
                </p>

                <div class="leesmeer"><a href="{{$post->link}}">Lees meer</a></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    <div class="col-md-12 visible-md visible-sm visible-xs">
        <div class="border_horizontal"></div>
    </div>
    <div class="col-md-8">
        <div class="border_vertical homeVertical hidden-md hidden-sm hidden-xs"></div>
        <div class="col-md-12" style="min-height: 170px;">
            @if(isset($featured))
             <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Uitgelicht
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>

            <div>
                <img
                    src="{{$featured->company->thumbnail_url ? $featured->company->thumbnail_url : 'http://placehold.it/220x230'}}"
                    alt="" class="pull-left giev-padding"/>


                <h3>{{{$featured->company->name}}}</h3>
                <h4>{{{$featured->company->city}}}</h4>
                <h4>{{{$featured->company->address}}}, {{{$featured->company->postal_code}}}</h4>
                <div style="display: inline-block;" class="leesmeer"><a href="{{$featured->link}}">Lees meer</a></div>
            </div>
            <div class="clear"></div>
            <div class="border_horizontal"></div>

            @endif
        </div>

        <div class="uitgelicht uitgelichtHome col-md-12">
                   <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Activiteiten
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
            </span>
            <ul class="list-inline">
                @foreach($featureds as $item)
                <li>
                    <a href="{{$item->link}}">
                        <ul>
                            @if(!empty($item->image))
                            <li class="image">
                                <img src="{{url('uploads/concepts/t/'.$item->image)}}" alt="">
                            </li>
                            @endif
                            <li>
                                <h2>{{\Fairtrade\Util::truncate($item->company->name, 20)}}</h2>
                            </li>
                            <li>
                                <h3>{{\Fairtrade\Util::truncate($item->title, 20)}}</h3>
                            </li>
                        </ul>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="border_horizontal"></div>
        </div>

        <div class="clear"></div>
         <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Bedrijven
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>

        <div>
            @foreach($companies as $company)
            <a href="{{url('waartekoop/bedrijf/'.$company->id)}}"><img
                    src="{{$company->thumbnail_url}}" alt="" class="floatLeft"/></a>
            @endforeach
        </div>
    </div>
</div>
@stop