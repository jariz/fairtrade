@extends('admin.layout')

@section('content')
<div class="container container-layout moar-padding">

        <h2>{{$plural}} heordenen</h2>
        <div class="form-group">
            <a class="btn btn-primary" href="{{URL::route('dashboard.pages')}}"><i class="fa fa-arrow-left"></i> Terug naar overzicht</a>
            <button data-toggle="tooltip" data-placement="right" title="De wijzigingen zijn opgeslagen." data-func="save" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Opslaan</button>
        </div>


    <div class="form-group load-message">
        <p class="text-center"><i class="fa fa-spinner fa-spin"></i> Bezig met het laden van de pagina's</p>
    </div>
    <table id="table" class="table table-striped hide">
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
            <tr data-id="{{$row['id']}}" data-order="{{$row['order']}}">
            <td>
                <button data-func="up" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-arrow-up"></span></button>
                <button data-func="down" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-arrow-down"></span></button>
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

@section('scripts')
    <script src="{{url('js/order-table.js')}}"></script>
@stop