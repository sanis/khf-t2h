@extends('admin::layouts.default')

@section('content')

<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
</div>
<div class="container">
    @include('admin::layouts.notifications')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-midnightblue">
                <div class="panel-heading"><h4>{{ trans('admin::group.edit_group') }}</h4></div>
                <div class="panel-body">
                    <p>{{ trans('admin::group.edit_description') }}</p>
                    {{ Form::open(array('route' => array('admin.group.edit.post','id'=>$group->id), 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form')) }}
                    {{ Form::hidden('groupId', $group->id); }}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="name">{{ trans('admin::group.name') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('name', $group->name, array('class'=>'form-control', 'placeholder'=>trans('admin::group.name'), 'id'=>'name', 'required'=>'required', 'disabled'=>'disabled')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="permissions[]">{{ trans('admin::group.permissions') }}</label>
                        <div class="col-sm-6">
                            @foreach ($groups as $group1)
                            @if (strtolower($group1->name) != strtolower($group->name))
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('permissions[]', strtolower($group1->name), array_key_exists(strtolower($group1->name),$permissions)) }}  {{{ $group1->name }}}
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('admin::group.save'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
                                <a href="{{ URL::route('admin.group.add') }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop