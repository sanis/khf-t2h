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
                <div class="panel-heading"><h4>{{ trans('suggestions::admin.add_suggestion') }}</h4></div>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'admin.suggestion.add.post', 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form')) }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title">{{ trans('suggestions::admin.title') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>trans('suggestions::admin.title'), 'id'=>'email', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="file">{{ trans('suggestions::admin.text') }}</label>
                        <div class="col-sm-6">
                            {{ Form::textarea('text',null,array('class'=>'form-control autosize')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="last_name">{{ trans('suggestions::admin.level') }}</label>
                        <div class="col-sm-6">
                            @foreach ($levels as $level)
                            <div class="checkbox">
                                <label>
                                    {{ Form::radio('level', strtolower($level->id)); }} {{{ $level->title }}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('suggestions::admin.create'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
                                <a href="{{ URL::route('admin.suggestion.add') }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop