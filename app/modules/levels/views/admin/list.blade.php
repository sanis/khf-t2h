@extends('admin::layouts.default')
@section('content')
<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>{{ trans('levels::admin.levels_control') }}</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.level.add') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ trans('levels::admin.add_level') }}</a>
        </div>
    </div>
</div>
<div class="container">
    @include('admin::layouts.notifications')


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-sky">
                <div class="panel-heading">
                    <h4>{{ trans('levels::admin.levels_list') }}</h4>
                </div>
                <div class="panel-body collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                        <thead>
                        <tr>
                            <th style="width:70px;">{{ trans('levels::admin.id') }}</th>
                            <th>{{ trans('levels::admin.title') }}</th>
                            <th>{{ trans('levels::admin.file') }}</th>
                            <th>{{ trans('levels::admin.sort') }}</th>
                            <th>{{ trans('levels::admin.control') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{{ $level->title }}}</td>
                            <td>{{{ $level->file }}}</td>
                            <td>{{{ $level->sort }}}</td>
                            <td class="center">
                                <a href="{{ URL::route('admin.level.edit',array('id'=>$level->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ URL::route('admin.level.delete',array('id'=>$level->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-minus-square"></i></a>
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