@extends('front.layout')

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHMw_AnGTT2sS9sPgUTXex5BcXgoHtZSI&amp;sensor=false&amp;libraries=places"></script>
<script src="{{url('js/front/javascript.js')}}"></script>
@stop

@section('content')
<h1>Fairtrade winkels bij u in de buurt</h1>
<div class="row">
    <div class="col-xs-8">
        <div id="gmaps"></div>
    </div>
    <div class="col-xs-4">
        <form action="" method="" class="form-horizontal" id="add_new_place_form">

            <label for="add_place_input" class="col-sm-2 control-label">Zoek</label>
            <div class="col-sm-10">
                <input type="text" name="place" id="add_place_input" placeholder="Geef een locatie op" class="form-control" autocomplete="off">
                <input style="margin-top: 10px;" type="submit" value="Zoeken" class="btn btn-default pull-right" id="add_place_button">
            </div>
        </form>
    </div>
</div>

<h2>Categori&euml;</h2>
<ul>
    @foreach ($categories as $category)
       <li><a href=""></a>{{ $category->name }}</li>
    @endforeach
</ul>


<h1 style="margin-top: 10px">Alle bedrijven</h1>
<table id="all_companies">
    @foreach ($companies as $company)
    <tr>
        <td data-geo-location="{{ $company->geo_location }}">{{ $company->name }}</td>
    </tr>
    @endforeach
</table>
@stop