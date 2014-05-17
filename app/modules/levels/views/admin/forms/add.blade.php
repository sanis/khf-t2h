@extends('admin::layouts.default')

@section('content')

<div id="page-heading">
    {{ '' /*Breadcrumbs::render(Route::current()->getName())*/ }}
</div>
<div class="container">
    @include('admin::layouts.notifications')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-midnightblue">
                <div class="panel-heading"><h4>{{ trans('levels::admin.add_level') }}</h4></div>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'admin.level.add.post', 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form','files'=>true)) }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title">{{ trans('levels::admin.title') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>trans('levels::admin.title'), 'id'=>'email', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="file">{{ trans('levels::admin.file') }}</label>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group">
                                    <div class="form-control uneditable-input" data-trigger="fileinput">
                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span>
                                    </div>
                            <span class="input-group-addon btn btn-default btn-file">
                                <span class="fileinput-new">Select file</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="...">
                            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="last_name">{{ trans('levels::admin.sort') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('sort', null, array('class'=>'form-control', 'placeholder'=>trans('levels::admin.sort'), 'id'=>'sort', 'data-type'=>'digits', 'required'=>'required')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('levels::admin.create'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
                                <a href="{{ URL::route('admin.level.add') }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop