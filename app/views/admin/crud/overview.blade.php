@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">
    <div class="pull-right">
        {{Form::open(['class'=>'row', 'method' => 'get', 'route' => $route])}}
        <a class="btn btn-success col-lg-2 pull-right" href="{{URL::route($route.'-add')}}"><i class="glyphicon glyphicon-plus-sign"></i> Aanmaken</a>
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
                <?php $formatted = $column["name"]."_formatted"; ?>
                @if($row->$formatted)
                {{{$row->$formatted}}}
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
                <td>
                    @if(!$trash)
                    {{Form::open(array('route'=>$route.'-delete'))}}
                    {{Form::hidden('id', $row->id)}}
                    <a href="{{URL::route($route.'-edit', array('id'=>$row->id))}}" class="btn btn-sm btn-warning glyphicon glyphicon-edit"></a>
                    <button type="submit" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button>
                    {{Form::close()}}
                    @else
                    {{Form::open(array('route'=>$route.'-dorestore'))}}
                    {{Form::hidden('id', $row->id)}}
                    <button type="submit" class="btn btn-success btn-sm glyphicon glyphicon-check"></button>
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
        <p><i class="glyphicon glyphicon-warning-sign"></i> U heeft een {{strtolower($singular)}} verwijdert</p>
        {{Form::open(['route'=>$route.'-dorestore'])}}
        {{Form::hidden('id', Session::get("restore_id"))}}
        {{Form::submit('Ongedaan maken', ['class'=>'btn btn-success pull-right btn-sm'])}}
        {{Form::close()}}
    </div>
</div>
@endif
@stop