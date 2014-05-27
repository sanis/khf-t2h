<?php
if (isset($_GET['f'])) {
    $details = file_get_contents(public_path().'/level6/'.$_GET['f'].'.txt');
    $details = explode('|',$details);
}

if (isset($_POST['login'])) {
    if ($_POST['password']==$details[1] && $_POST['login']==$details[0]) {
        header('location: level7.php');
	die();
    } else {
        header('location: level6.php?success=0');
	die();
    }
}

?>
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
            <a class="navbar-brand" href="<?php echo URL::route('/'); ?>">Try2Hack</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
		<ul class="nav navbar-nav">
		<?php foreach ($level->suggestions as $suggestion) {
                if ($suggestion->limit_from <= $tries) {?>
                    <li><a class="fancybox" href="#suggestion<?php echo $suggestion->id; ?>"><?php echo $suggestion->title; ?></a>
                    </li>
		<?php } } ?>
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

<div class="container" style='padding-top:50px'>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to go to next level (now 6)</h1>

            <div class="account-wall">
                <img class="profile-img"
                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">

                <form class="form-signin" id="login-form" method="post" action="level6.php?f=users">
                    <input type="text" class="form-control" placeholder="Login" id="login" name="login" required autofocus>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autofocus
                           style="margin-top: 10px">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ($level->suggestions as $suggestion) {
        if ($suggestion->limit_from <= $tries) { ?>
<div id="suggestion<?php echo $suggestion->id; ?>" style="width:100%;display: none;">
<h3><?php echo $suggestion->title; ?></h3>
<p>
<?php echo nl2br($suggestion->text); ?>
</p>
</div>
<?php } } ?>
<?php if (isset($_GET['success']) && $_GET['success']=='0') { ?>
    <script>
        alert('not this time');
        $("#login").val('');
        $("#password").val('');
    </script>
<?php } ?>
<script>
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
</body>
</html>
