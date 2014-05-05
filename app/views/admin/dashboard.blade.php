@extends('admin.layout')

@section('content')
<div class="container container-layout">
    <div class="page-header">
        <h1>Overzicht
            <small>kort overzicht van alle systeem functies</small>
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php $i = 0; ?>
            @foreach($cruds as $crud)
            <?php $i++; ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{$crud->plural}}
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            @foreach($crud->columns as $column => $attributes)
                            <th>
                                {{$column}}
                            </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($crud->data) == 0)
                        <tr>
                            <td colspan="{{count($crud->columns)+1}}" class="text-center text-danger">
                                Geen resultaten gevonden
                            </td>
                        </tr>
                        @endif
                        @foreach($crud->data as $row)
                        <tr>
                            @foreach($crud->columns as $column)
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
                    @if($crud->count > 5)
                    <a class="btn btn-primary btn-block" href="{{URL::route($crud->route)}}">Meer...</a>
                    @endif
                </div>
            </div>
            @if(round(count($cruds) / 2) == $i)
        </div>
        <div class="col-lg-6">
            @endif
            @endforeach
        </div>
    </div>
</div>
@stop