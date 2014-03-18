@extends('admin::layouts.simple')

@section('content')

<div class="panel panel-primary">
    @include('admin::layouts.notifications')
    <div class="panel-body">
        <h4 class="text-center" style="margin-bottom: 25px;">{{ trans('admin::login.wellcome_login') }}</h4>
        {{ Form::open(array('route' => 'admin.login.post', 'class'=>'form-horizontal','style'=>'margin-bottom: 0px !important;', 'id'=>'admin_login')) }}
        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>trans('admin::login.username'), 'id'=>'username')) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>trans('admin::login.password'), 'id'=>'password')) }}
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right"><label for="remember">{{ Form::checkbox('remember',1,true,array('style'=>'margin-bottom: 20px')) }} {{ trans('admin::login.remember_me') }}</label></div>
        </div>
        {{ Form::close() }}

    </div>
    <div class="panel-footer">
        <a href="{{ URL::route('admin.remind') }}" class="pull-left btn btn-link" style="padding-left:0">{{ trans('admin::login.forgot_pass') }}?</a>

        <div class="pull-right">
            <a href="{{ URL::route('admin.login') }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>

            {{ Form::button(trans('admin::login.log_in'), array('class'=>'btn btn-primary', 'form'=>'admin_login', 'type'=>'submit')) }}

        </div>
    </div>
</div>
@stop