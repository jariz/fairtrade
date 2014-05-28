@extends('admin.layout')

@section('content')


<div class="container container-layout moar-padding">
    <div class="pull-right">
        {{Form::open(['class'=>'row', 'method' => 'get', 'route' => $route])}}
        <a class="btn btn-success col-lg-2 pull-right" href="{{URL::route($route.'-add')}}"><i class="glyphicon glyphicon-plus-sign"></i> Aanmaken</a>
        @if($reorder)
            <a style="margin-right:10px;" class="btn btn-info col-lg-2 pull-right" href="{{URL::route('dashboard.pages-reorder')}}"><i class="fa fa-list-ol"></i> Ordenen</a>
        @endif
        <div class="input-group col-lg-4 pull-right" style="margin-right:10px;">
            {{Form::text('q', \Input::get('q'), ['class'=>'form-control search', 'placeholder'=>'Zoeken...'])}}
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>
        <h2 class="pull-left">{{$plural}}</h2>
        {{Form::close()}}
    </div>

    <ul class="nav nav-tabs">
        <li @if(!$trash) class="active" @endif ><a href="{{URL::route($route)}}"><i class="glyphicon glyphicon-list"></i> Overzicht</a></li>
        <li @if($trash) class="active" @endif ><a href="{{URL::route($route.'-trash')}}"><i class="glyphicon glyphicon-trash"></i> Prullenbak</a></li>
    </ul>
    @if( Session::has('error') )
          <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-exclamation-triangle"></i> {{Session::get('error')}}
          </div>
        @endif
    <table class="table table-striped">
        <thead>
        <tr>
            @foreach($columns as $column => $attributes)
            <th>
                {{$column}}
            </th>
            @endforeach
            @if($timestamps)
            <th>
                Aangemaakt op
            </th>
            <th>
                Aangepast op
            </th>
            @endif
            <th>
                Acties
            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) == 0)
        <tr>
            <td colspan="{{count($columns)+1+($timestamps ? 2 : 0)}}" class="text-center text-danger">
                Geen resultaten gevonden
            </td>
        </tr>
        @endif
            @foreach($data as $row)
            <tr>
            @foreach($columns as $column)
            <td>
                @if(isset($column["boolean"]) && $column["boolean"] === true)
                @if($row->$column["name"])
                <span class="label label-success">
                    Ja
                </span>
                @else
                <span class="label label-danger">
                    Nee
                </span>
                @endif
                @else
                @if( $with != false && array_key_exists( 'property', $column))
                {{{$row->$with->$column['property']}}}
                @elseif($column["type"] == "color")
                <div style="width:20px;height:20px;border:2px solid black; border-radius:3px;background-color: {{$row->$column["name"]}}"></div>
                @else
                {{{$row->$column["name"]}}}
                @endif
                @endif
            </td>
            @endforeach
                @if($timestamps)
                <td>
                    {{$row->created_formatted}}
                </td>
                <td>
                    {{$row->updated_formatted}}
                </td>
                @endif
                <td class="overview-actions">
                    @if(!$trash)
                    {{Form::open(array('route'=>$route.'-delete'))}}
                    {{Form::hidden('id', $row->id)}}
                    <p><a href="{{URL::route($route.'-edit', array('id'=>$row->id))}}" class="btn btn-link btn-sm"><i class="glyphicon glyphicon-edit"></i> Bewerken</a></p>
                    <p><button type="submit" class="btn btn-link btn-sm"><i class="glyphicon glyphicon-trash"></i> Verwijderen</button></p>
                    {{Form::close()}}
                    @else
                    {{Form::open(array('route'=>$route.'-dorestore'))}}
                    {{Form::hidden('id', $row->id)}}
                    <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-check"></i>Herstellen</button>
                    {{Form::close()}}

                    {{Form::open(array('route'=>$route.'-perm-delete'))}}
                    {{Form::hidden('id', $row->id)}}
                    <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-check"></i>Verwijderen</button>
                    {{Form::close()}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-center">
        {{$data->links()}}
    </div>
</div>

@if(\Session::has("restore_id"))
<div class="alert alert-danger alert-floating">
    <div class="container">
        <p><i class="glyphicon glyphicon-warning-sign"></i> U heeft een {{strtolower($singular)}} verwijderd</p>
        {{Form::open(['route'=>$route.'-dorestore'])}}
        {{Form::hidden('id', Session::get("restore_id"))}}
        {{Form::submit('Ongedaan maken', ['class'=>'btn btn-success pull-right btn-sm'])}}
        {{Form::close()}}
    </div>
</div>
@endif
@stop