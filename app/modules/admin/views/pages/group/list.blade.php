@extends('admin::layouts.default')

@section('content')

<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>{{ trans('admin::group.groups_control') }}</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.group.add') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ trans('admin::group.add_group') }}</a>
        </div>
    </div>
</div>
<div class="container">
    @include('admin::layouts.notifications')


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-sky">
                <div class="panel-heading">
                    <h4>{{ trans('admin::group.list_title') }}</h4>
                </div>
                <div class="panel-body collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                        <thead>
                        <tr>
                            <th style="width:70px;">{{ trans('admin::group.id') }}</th>
                            <th>{{ trans('admin::group.name') }}</th>
                            <th>{{ trans('admin::group.permissions') }}</th>
                            <th>{{ trans('admin::group.control') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{{ $group->name }}}</td>
                            <td>
                                @foreach ($group->getPermissions() as $permissionKey => $permission)
                                    {{{ $permissionKey }}},
                                @endforeach
                            </td>
                            <td class="center">

                                <a href="{{ URL::route('admin.group.edit',array('id'=>$group->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ URL::route('admin.group.delete',array('id'=>$group->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-minus-square"></i></a>

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