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
                <div class="panel-heading"><h4>{{ trans('news::admin.add.add_news') }}</h4></div>
                <div class="panel-body">
                    <p>{{ trans('news::admin.add.add_description') }}</p>
                    {{ Form::open(array('route' => array('admin.newsCategory.edit.post',$category_info->id), 'class'=>'form-horizontal row-border','data-validate'=>'parsley', 'id'=>'validate-form')) }}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="name">{{ trans('news::admin.add.title') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('title', $category_info->title, array('class'=>'form-control', 'placeholder'=>trans('news::admin.add.title'), 'id'=>'title', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="name">{{ trans('news::admin.add.slug') }}</label>
                        <div class="col-sm-6">
                            {{ Form::text('slug', $category_info->slug, array('class'=>'form-control', 'placeholder'=>trans('news::admin.add.slug'), 'id'=>'title', 'required'=>'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ trans('news::admin.add.subcategory_of') }}</label>
                        <div class="col-sm-6">
                            {{ Form::select('parentId',array('' => '---- ROOT ----') + $categories,$category_info->parent_id,array('class'=>'form-control')) }}
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                {{ Form::button(trans('news::admin.add'), array('class'=>'btn btn-primary', 'form'=>'validate-form', 'type'=>'submit', 'onclick'=>'javascript:$(\'#validate-form\').parsley( \'validate\' );')) }}
                                <a href="{{ URL::route('admin.newsCategory.add') }}" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop