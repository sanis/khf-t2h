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
                <div class="panel-heading"><h4>{{ trans('admin::account.edit_settings') }}</h4></div>
                <div class="panel-body">
                    <p>{{ trans('admin::account.account_description') }}</p>
                    {{ Form::open(array('route' => 'admin.account.post', 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form')) }}

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="email">{{ trans('admin::login.email') }}</label>
                            <div class="col-sm-6">
                                {{ Form::text('email', $user->email, array('class'=>'form-control', 'placeholder'=>trans('admin::login.email'), 'id'=>'email', 'data-type'=>'email', 'required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="first_name">{{ trans('admin::account.first_name') }}</label>
                            <div class="col-sm-6">
                                {{ Form::text('first_name', $user->first_name, array('class'=>'form-control', 'placeholder'=>trans('admin::account.first_name'), 'id'=>'first_name', 'data-minlength'=>'3', 'required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="last_name">{{ trans('admin::account.last_name') }}</label>
                            <div class="col-sm-6">
                                {{ Form::text('last_name', $user->last_name, array('class'=>'form-control', 'placeholder'=>trans('admin::account.last_name'), 'id'=>'last_name', 'data-minlength'=>'3', 'required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="password">{{ trans('admin::login.password') }}</label>
                            <div class="col-sm-6">
                                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>trans('admin::login.password'), 'id'=>'password','data-equalto'=>'#password_confirmation')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ trans('admin::login.password_confirmation') }}</label>
                            <div class="col-sm-6">
                                {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>trans('admin::login.password_confirmation'), 'id'=>'password_confirmation', 'data-equalto'=>'#password')) }}
                            </div>
                        </div>

                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('admin::account.update'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
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