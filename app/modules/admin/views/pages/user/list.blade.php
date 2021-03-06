@extends('admin::layouts.default')

@section('content')

<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>{{ trans('admin::user.users_control') }}</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.user.add') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ trans('admin::user.add_title') }}</a>
        </div>
    </div>
</div>
<div class="container">
@include('admin::layouts.notifications')


<div class="row">
<div class="col-md-12">
<div class="panel panel-sky">
<div class="panel-heading">
    <h4>{{ trans('admin::user.user_list') }}</h4>
</div>
<div class="panel-body collapse in">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
<thead>
<tr>
    <th style="width:70px;">{{ trans('admin::user.id') }}</th>
    <th>{{ trans('admin::user.email') }}</th>
    <th>{{ trans('admin::user.first_name') }}</th>
    <th>{{ trans('admin::user.last_name') }}</th>
    <th>{{ trans('admin::user.groups') }}</th>
    <th>{{ trans('admin::user.control') }}</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user1)
<tr>
    <td>{{ $user1->id }}</td>
    <td>{{{ $user1->email }}}</td>
    <td>{{{ $user1->first_name }}}</td>
    <td>{{{ $user1->last_name }}}</td>
    <td>
        @foreach ($user1->groups as $group)
            {{{ $group->name }}},
        @endforeach
    </td>
    <td class="center">
        @if ($user1->id == '1')
        SUPERUSER!!!
        @else
            <a href="{{ URL::route('admin.user.edit',array('id'=>$user1->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
            <a href="{{ URL::route('admin.user.delete',array('id'=>$user1->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-minus-square"></i></a>
            @if ($user1->activated=='0')
                <a href="{{ URL::route('admin.user.activate',array('id'=>$user1->id)) }}" class="btn btn-xs btn-success"><i class="fa fa-check-square"></i></a>
            @else
                <a href="{{ URL::route('admin.user.deactivate',array('id'=>$user1->id)) }}" class="btn btn-xs btn-warning"><i class="fa fa-check-square fa-rotate-180"></i></a>
            @endif
        @endif
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