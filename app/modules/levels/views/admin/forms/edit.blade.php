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
                <div class="panel-heading"><h4>{{ trans('levels::admin.edit_level') }}</h4></div>
                <div class="panel-body">
                    {{ Form::open(array('route' => array('admin.level.edit.post',$level->id), 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form')) }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title">{{ trans('levels::admin.title') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('title', $level->title, array('class'=>'form-control', 'placeholder'=>trans('levels::admin.title'), 'id'=>'email', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="last_name">{{ trans('levels::admin.sort') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('sort', $level->sort, array('class'=>'form-control', 'placeholder'=>trans('levels::admin.sort'), 'id'=>'sort', 'data-type'=>'digits', 'required'=>'required')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('levels::admin.save'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
                                <a href="{{ URL::route('admin.level.edit', array($level->id)) }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop