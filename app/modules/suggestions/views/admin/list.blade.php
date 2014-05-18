@extends('admin::layouts.default')
@section('content')
<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>{{ trans('suggestions::admin.suggestions_control') }}</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.suggestion.add') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ trans('suggestions::admin.add_suggestion') }}</a>
        </div>
    </div>
</div>
<div class="container">
    @include('admin::layouts.notifications')


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-sky">
                <div class="panel-heading">
                    <h4>{{ trans('suggestions::admin.suggestions_list') }}</h4>
                </div>
                <div class="panel-body collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                        <thead>
                        <tr>
                            <th style="width:70px;">{{ trans('suggestions::admin.id') }}</th>
                            <th>{{ trans('suggestions::admin.title') }}</th>
                            <th>{{ trans('suggestions::admin.level') }}</th>
                            <th>{{ trans('suggestions::admin.control') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($suggestions as $suggestion)
                        <tr>
                            <td>{{ $suggestion->id }}</td>
                            <td>{{{ $suggestion->title }}}</td>
                            <td>{{{ $suggestion->levels->title }}}</td>
                            <td class="center">
                                <a href="{{ URL::route('admin.suggestion.edit',array('id'=>$suggestion->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ URL::route('admin.suggestion.delete',array('id'=>$suggestion->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-minus-square"></i></a>
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