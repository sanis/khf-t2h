<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ trans('admin::login.login_title') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Just a page for admins">
    <meta name="author" content="Justinas Bolys">

    <!-- <link href="assets/less/styles.less" rel="stylesheet/less" media="all"> -->
    <link rel="stylesheet" href="{{ asset($assetDir.'css/styles.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{ asset($assetDir.'js/less.js') }}"></script>
</head><body class="focusedform">

<div class="verticalcenter">
    <a href="login"><img src="{{ asset($assetDir.'img/logo-big.png') }}" alt="Logo" class="brand" /></a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <h4 class="text-center" style="margin-bottom: 25px;">{{ trans('admin::login.wellcome_login') }}</h4>
            <form action="#" class="form-horizontal" style="margin-bottom: 0px !important;">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="username" placeholder="{{ trans('admin::login.username') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="{{ trans('admin::login.password') }}">
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="pull-right"><label><input type="checkbox" style="margin-bottom: 20px" checked=""> {{ trans('admin::login.remember_me') }}</label></div>
                </div>
            </form>

        </div>
        <div class="panel-footer">
            <a href="extras-forgotpassword.htm" class="pull-left btn btn-link" style="padding-left:0">{{ trans('admin::login.forgot_pass') }}?</a>

            <div class="pull-right">
                <a href="#" class="btn btn-default">{{ trans('admin::login.reset') }}</a>
                <a href="index.htm" class="btn btn-primary">{{ trans('admin::login.log_in') }}</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>