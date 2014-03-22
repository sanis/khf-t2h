@extends('admin::layouts.simple')

@section('content')
<div class="panel panel-primary">
    @include('admin::layouts.notifications')
    <div class="panel-body">
        <h4 class="text-center" style="margin-bottom: 25px;">{{ trans('admin::login.wellcome_remind2') }}</h4>
        {{ Form::open(array('route' => 'admin.remind.post', 'class'=>'form-horizontal','style'=>'margin-bottom: 0px !important;', 'id'=>'admin_remind2')) }}
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>trans('admin::login.password'), 'id'=>'password')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>trans('admin::login.password_confirmation'), 'id'=>'password_confirmation')) }}
                    </div>
                </div>
            </div>
        {{ Form::hidden('resetCode', $resetCode) }}
        {{ Form::close() }}

    </div>
    <div class="panel-footer">
        <div class="pull-left">
            <a href="{{ URL::route('admin.login') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> {{ trans('admin::login.back') }}</a>
        </div>
        <div class="pull-right">
            {{ Form::button(trans('admin::login.change_password'), array('class'=>'btn btn-success', 'form'=>'admin_remind2', 'type'=>'submit')) }}
        </div>
    </div>
</div>
@stop