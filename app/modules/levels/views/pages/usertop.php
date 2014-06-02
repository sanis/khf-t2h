<!DOCTYPE html>
<html lang="en">
<head>
    <title>Try2hack</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo asset($frontAssetDir.'css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo asset($frontAssetDir.'css/custom.css') ?>" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo asset($frontAssetDir.'js/bootstrap.js') ?>"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo asset(str_replace('dist/','',$frontAssetDir.'source/jquery.fancybox.js')) ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset(str_replace('dist/','',$frontAssetDir.'source/jquery.fancybox.css')) ?>" media="screen" />
    <style>
        .custab{
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }
        .custab:hover{
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }</style>
</head>
<body>
<!-- Login bar start -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL::route('/'); ?>">Try2Hack</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo URL::route('usertop'); ?>">User TOP</a>
                        </li>
                    </ul>
                </li>
                </ul>
                <?php if (!Sentry::check()) { ?>
                    <form class="navbar-form navbar-right" role="search" action="login.html" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-default">Sign In</button>
                    </form>
                <?php } else { ?>
                    <div class="nav navbar-nav navbar-right" style="padding-top: 15px;">
                        Logged in as
                        <?php echo Sentry::getUser()->first_name ?>
                        <?php echo Sentry::getUser()->last_name ?>. <a href="logout.html">Logout?</a>
                    </div>
                <?php } ?>
            </div>
        </center>
    </div>
</div>
<!-- Login bar end -->
<div class="container" style="padding-top:50px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">USERS TOP</h1>

                    <table class="table table-striped custab">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Levels</th>
                            <th>Tries</th>
                        </tr>
                        </thead>
                        <?php foreach ($top_users as $top_user) { ?>
                            <tr>
                                <td><?php if ($top_user->first_name!=NULL && $top_user->last_name!=NULL) { echo $top_user->first_name . ' ' . $top_user->last_name; } else { echo '<em>Unknown</em>'; } ?></td>
                                <td><?php echo $top_user->levels; ?></td>
                                <td><?php echo $top_user->tries; ?></td>
                            </tr>
                        <?php } ?>
                    </table>

        </div>
    </div>
</div>

<script type="text/javascript" src="data:text/javascript;base64,ICQoICIjbG9naW4tZm9ybSIgKS5zdWJtaXQoZnVuY3Rpb24oIGV2ZW50ICkgew0KICAgICAgICB2YXIgbG9naW4gPSAkKCIjbG9naW4iKTsNCiAgICAgICAgdmFyIHBhc3N3b3JkID0gJCgiI3Bhc3N3b3JkIik7DQogICAgICAgIGlmICgobG9naW4udmFsKCk9PSdoYWNrZXInKSAmJiAocGFzc3dvcmQudmFsKCk9PSd2dWtoZicpKSB7DQogICAgICAgICAgICBpZihjb25maXJtKCdMb2dpbiBzdWNlc3NmdWwsIGNvbnRpbnVlIHRvIG5leHQgbGV2ZWwnKSkgew0KICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gJ2xldmVsMi5waHAnOw0KICAgICAgICAgICAgfQ0KICAgICAgICB9IGVsc2Ugew0KICAgICAgICAgICAgYWxlcnQoJ05vdCB0aGlzIHRpbWUnKTsNCiAgICAgICAgICAgIGxvZ2luLnZhbCgnJyk7DQogICAgICAgICAgICBwYXNzd29yZC52YWwoJycpOw0KICAgICAgICB9DQogICAgICAgIHJldHVybiBmYWxzZTsNCiAgICB9KTs="></script>
<script>
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
</body>
</html>
