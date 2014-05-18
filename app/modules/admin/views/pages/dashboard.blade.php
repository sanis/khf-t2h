@extends('admin::layouts.default')

@section('content')

<div id="page-heading">
    {{ Breadcrumbs::render(Route::current()->getName()) }}
    <h1>Dashboard</h1>
</div>
<div class="container">
    @include('admin::layouts.notifications')

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <a class="info-tiles tiles-toyo" href="#">
                        <div class="tiles-heading">Log entries</div>
                        <div class="tiles-body-alt">
                            <i class="fa fa-bar-chart-o"></i>
                            <div class="text-center">{{ App\Modules\Logs\Models\Log::all()->count() }}</div>
                        </div>
                        <div class="tiles-footer">View</div>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <a class="info-tiles tiles-orange" href="#">
                        <div class="tiles-heading">Users</div>
                        <div class="tiles-body-alt">
                            <i class="fa fa-group"></i>
                            <div class="text-center">{{ User::all()->count() }}</div>
                        </div>
                        <div class="tiles-footer">View</div>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <a class="info-tiles tiles-alizarin" href="#">
                        <div class="tiles-heading">Levels</div>
                        <div class="tiles-body-alt">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="text-center">{{ App\Modules\Levels\Models\Level::all()->count() }}</div>
                        </div>
                        <div class="tiles-footer">View</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->

@stop