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
		@import url(//fonts.googleapis.com/css?family=Lato:700);


		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

	</style>
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
	<div class="welcome">
		<?php
            foreach (App\Modules\Levels\Models\Level::all() as $level) {
                ?>
            <a href="<?php echo $level->file; ?>"><?php echo $level->title; ?></a><br />
        <?php
            }
        ?>
	</div>
</body>
</html>
