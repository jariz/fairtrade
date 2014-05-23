@extends("front.templates.{$template}.layout")

@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
    <script src="{{ URL::asset('js/front/javascript.js') }}"></script>
@stop

@section('content')
    <div class="wrapper" data-base="{{ URL::to('/') }}">
    </div>
    <div class="col-md-12 buurtWrap">
        <div class="col-md-3">
            <div class="border_vertical"></div> 
            <span class="h2Wrap">
                <span class="h2Left">
                    <img src="{{ URL::asset("images/h2Left.png") }}" alt="">
                </span>
                    <h2> In de buurt</h2>
                <span class="h2Right">
                   <img src="{{ URL::asset("images/h2Right.png") }}" alt="">
                </span>
            </span>

            <h3>Ben jij al Fairtrade?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
            <p> quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class="col-md-9">
            <div class="maps">
                <div id="gmaps" data-category="{{ $category_id }}"></div>
            </div>

            <div class="form-group">
                <form class="form-inline" role="form">
                    <input type="text" name="place" id="searchform" placeholder="Zoekbalk" class="form-control" autocomplete="off">
                    <input type="submit" value="Zoeken" class="btn btn-warning" id="add_place_button">
                </form>
                <h2>Categori&euml;</h2>
                @if (isset($categories))
                    <ul>
                        @foreach ($categories as $category)
                            <li style="color:{{ $category->color }}">{{ link_to_route('wheretobuy.category', $category->name, $parameters = array('id' => $category->id), $attributes = array('style' => 'color: $category->color')); }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <!--
        <a href=""><img class="iosapp" src="img/iosapp.png" alt="ios app"></a>
        <a href=""><img class="androidapp" src="img/androidapp.png" alt="ios app"></a>
        -->

    </div>
    <div class="col-md-12">
        <div class="border_horizontal"></div>
        <div class="col-md-12 bedrijvenmaps">
            <span class="h2Wrap">
                <span class="h2Left">
                    <img src="{{ URL::asset("images/h2Left.png") }}" alt="">
                </span>
                    <h2>
                       Bedrijven
                    </h2>
                <span class="h2Right">
                   <img src="{{ URL::asset("images/h2Right.png") }}" alt="">
                </span>
            </span>
            <div class="row">
            @if (isset($companies))
                <?php $i = 0; ?>
                @foreach ($companies as $company)
                <?php $i++; ?>
                <div class="col-lg-2">
                     <a href="{{ URL::route('companydetail', $parameters = array('id' => $company->id), $absolute = true ) }}">
                        @if(isset($company->logo) && $company->logo != '')
                            <img src="{{ asset('uploads/logos/t/'. $company->logo) }}" alt="{{ $company->name }}" class="" style="margin-right:10px; margin-bottom: 10px"/>
                        @else
                            {{ $company->name }}
                        @endif
                     </a>
                </div>
                @if($i > 4)
                <?php $i = 0; ?>
                </div>
                <div class="row">
                @endif
                @endforeach
            @endif
            </div>
            <center>
                {{$companies->links()}}
            </center>
        </div>
    </div>
@stop