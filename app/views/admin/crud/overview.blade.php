@extends('admin.dashboard')

@section('content')
<div class="container container-layout moar-padding">

    <a class="btn btn-success pull-right" href="{{URL::route($route.'-add')}}">Aanmaken</a>
    <h2>{{$plural}}</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            @foreach($columns as $column => $attributes)
            <th>
                {{$column}}
            </th>
            @endforeach
            <th>
                Acties
            </th>
        </tr>
        </thead>
        <tbody>
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
                {{$row->$column["name"]}}
                @endif
            </td>
            @endforeach
                <td>
                    {{Form::open(array('route'=>$route.'-delete'))}}
                    {{Form::hidden('id', $row->id)}}
                    <a href="{{URL::route($route.'-edit', array('id'=>$row->id))}}" class="btn btn-sm btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-center">
        {{$data->links()}}
    </div>
</div>
@stop