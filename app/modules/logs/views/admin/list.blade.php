@extends('admin::layouts.default')
@section('content')
<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>{{ trans('logs::admin.logs_control') }}</h1>
    <div class="options">
        <div class="btn-toolbar">
            @if (isset($deleteUser))
            <a href="{{ URL::route('admin.log.deleteByUser',array($deleteUser)) }}" class="btn btn-danger"><i class="fa fa-plus"></i> {{ trans('logs::admin.clear') }} (user)</a>
            @elseif (isset($deleteLevel))
            <a href="{{ URL::route('admin.log.deleteByLevel',array($deleteLevel)) }}" class="btn btn-danger"><i class="fa fa-plus"></i> {{ trans('logs::admin.clear') }} (level)</a>
            @else
            <a href="{{ URL::route('admin.log.deleteAll') }}" class="btn btn-danger"><i class="fa fa-plus"></i> {{ trans('logs::admin.clear') }} (all)</a>
            @endif
        </div>
    </div>
</div>
<div class="container">
    @include('admin::layouts.notifications')


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-sky">
                <div class="panel-heading">
                    <h4>{{ trans('logs::admin.logs_list') }}</h4>
                </div>
                <div class="panel-body collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                        <thead>
                        <tr>
                            <th style="width:70px;">{{ trans('logs::admin.id') }}</th>
                            <th>{{ trans('logs::admin.student') }}</th>
                            <th>{{ trans('logs::admin.level') }}</th>
                            <th>{{ trans('logs::admin.date') }}</th>
                            <th>{{ trans('logs::admin.control') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td><a href="{{ URL::route('admin.logsByUser',array('id'=>$log->user)) }}">{{{ $log->users->first_name.' '.$log->users->last_name }}}</a></td>
                            <td><a href="{{ URL::route('admin.logsByLevel',array('id'=>$log->level)) }}">{{{ $log->levels->title }}}</a></td>
                            <td>{{{ $log->created_at }}}</td>
                            <td class="center">
                                <a href="{{ URL::route('admin.log.view',array('id'=>$log->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-book"></i></a>
                                <a href="{{ URL::route('admin.log.delete',array('id'=>$log->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-minus-square"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container -->
@stop