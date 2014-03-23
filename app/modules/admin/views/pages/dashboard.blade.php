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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Some stats</h4>
                    <div class="options">

                    </div>
                </div>
                <div class="panel-body">
                    Shitting and sitting
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->

@stop