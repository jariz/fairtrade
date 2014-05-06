@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">

        <h2>{{$plural}} heordenen</h2>
        <div class="form-group">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Opslaan</button>
        </div>



    <table class="table table-striped">
        <thead>
        <tr>
            <th>Acties</th>
            @foreach($columns as $column => $attributes)

            <th>
                {{$column}}
            </th>
            @endforeach


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
            <td>
                <button class="btn btn-sm btn-default"><span class="glyphicon glyphicon-arrow-up"></span></button>
                <button class="btn btn-sm btn-default"><span class="glyphicon glyphicon-arrow-down"></span></button>
            </td>
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