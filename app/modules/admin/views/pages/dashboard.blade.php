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
                    <a class="info-tiles tiles-toyo" href="{{ URL::route('admin.logs') }}">
                        <div class="tiles-heading">Log entries</div>
                        <div class="tiles-body-alt">
                            <i class="fa fa-bar-chart-o"></i>
                            <div class="text-center">{{ App\Modules\Logs\Models\Log::all()->count() }}</div>
                        </div>
                        <div class="tiles-footer">View</div>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <a class="info-tiles tiles-orange" href="{{ URL::route('admin.user.list') }}">
                        <div class="tiles-heading">Users</div>
                        <div class="tiles-body-alt">
                            <i class="fa fa-group"></i>
                            <div class="text-center">{{ User::all()->count() }}</div>
                        </div>
                        <div class="tiles-footer">View</div>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <a class="info-tiles tiles-alizarin" href="{{ URL::route('admin.levels') }}">
                        <div class="tiles-heading">Levels</div>
                        <div class="tiles-body-alt">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="text-center">{{ App\Modules\Levels\Models\Level::all()->count() }}</div>
                        </div>
                        <div class="tiles-footer">View</div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Users who tried this game TOP</h4>
                            <div class="options">

                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Levels</th>
                                    <th>Tries</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($top_users as $top_user) { ?>
                                    <tr>
                                        <td><?php if ($top_user->first_name!=NULL) { echo $top_user->first_name; } else { echo '<em>Unknown</em>'; } ?></td>
                                        <td><?php if ($top_user->last_name!=NULL) { echo $top_user->last_name; } else { echo '<em>Unknown</em>'; } ?></td>
                                        <td><?php echo $top_user->levels; ?></td>
                                        <td><?php echo $top_user->tries; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- container -->

@stop