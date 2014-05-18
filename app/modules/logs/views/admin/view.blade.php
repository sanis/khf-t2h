@extends('admin::layouts.default')
@section('content')
<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>{{ trans('logs::admin.view') }}</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.log.delete', array($log->id)) }}" class="btn btn-danger"><i class="fa fa-plus"></i> {{ trans('logs::admin.delete') }}</a>
        </div>
    </div>
</div>
<div class="container">
    @include('admin::layouts.notifications')


    <div class="row">
        <div class="col-md-12">
            <p>
            <b>Date:</b> {{ $log->created_at }}<br />
            <b>Student:</b> {{ $log->users->first_name.' '.$log->users->last_name }} ({{$log->users->email}})<br />
            <b>Student:</b> {{ $log->levels->title }} ({{ $log->levels->file}})
            </p>
            <b>GET parameters:</b>
           <pre>{{{ $log->get }}}</pre>
            <b>POST parameters:</b>
           <pre>{{{ $log->post }}}</pre>
            <b>SERVER parameters:</b>
           <pre>{{{ $log->server }}}</pre>
            <b>REQUEST parameters:</b>
           <pre>{{{ $log->request }}}</pre>
        </div>
    </div>

</div> <!-- container -->
@stop