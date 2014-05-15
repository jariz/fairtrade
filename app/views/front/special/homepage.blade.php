@extends("front.templates.{$template}.layout")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>Homepage</h1>
            {{ $dynamic or null }}

        </div>
    </div>
@stop