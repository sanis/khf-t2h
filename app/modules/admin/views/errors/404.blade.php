@extends('admin::layouts.simple')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-body">
            <h4 class="text-center" style="margin-bottom: 25px;font-size:4em;">404</h4>
                {{ trans('admin::errors.sorry_404') }}

        </div>

    </div>
@stop