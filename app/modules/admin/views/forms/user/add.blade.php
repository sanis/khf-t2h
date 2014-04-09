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
                <div class="panel-heading"><h4>{{ trans('admin::user.add_title') }}</h4></div>
                <div class="panel-body">
                    <p>{{ trans('admin::user.add_description') }}</p>
                    {{ Form::open(array('route' => 'admin.user.add.post', 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form')) }}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="email">{{ trans('admin::user.email') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>trans('admin::user.email'), 'id'=>'email', 'data-type'=>'email', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="first_name">{{ trans('admin::user.first_name') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>trans('admin::user.first_name'), 'id'=>'first_name', 'data-minlength'=>'3', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="last_name">{{ trans('admin::user.last_name') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>trans('admin::user.last_name'), 'id'=>'last_name', 'data-minlength'=>'3', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="password">{{ trans('admin::user.password') }}</label>
                        <div class="col-sm-6">
                            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>trans('admin::user.password'), 'id'=>'password','data-equalto'=>'#password_confirmation', 'required'=>'required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ trans('admin::user.password_confirmation') }}</label>
                        <div class="col-sm-6">
                            {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>trans('admin::user.password_confirmation'), 'id'=>'password_confirmation', 'data-equalto'=>'#password', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ trans('admin::user.group') }}</label>
                        <div class="col-sm-6">
                            @foreach ($groups as $group)
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('groups[]', strtolower($group->name)); }} {{{ $group->name }}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ trans('admin::user.activated') }}</label>
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('activated', '1'); }} {{{ trans('admin::user.yes') }}}
                                </label>
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('admin::user.create'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
                                <a href="{{ URL::route('admin.account') }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop