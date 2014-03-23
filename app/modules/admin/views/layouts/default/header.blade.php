<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="{{ trans('admin::dashboard.toggle_sidebar') }}"></a>
    <a id="rightmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="left" title="{{ trans('admin::dashboard.toggle_infobar') }}"></a>

    <div class="navbar-header pull-left">
        <a class="navbar-brand" href="{{ URL::route('admin.dashboard') }}"></a>
    </div>

    <ul class="nav navbar-nav pull-right toolbar">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs">{{{ $user->first_name.' '.$user->last_name }}} <i class="fa fa-caret-down"></i></span><img src="{{ asset($assetDir.'demo/avatar/dangerfield.png') }}" alt="Dangerfield" /></a>
            <ul class="dropdown-menu userinfo arrow">
                <li class="username">
                    <a href="#">
                        <div class="pull-left"><img class="userimg" src="{{ asset($assetDir.'demo/avatar/dangerfield.png') }}" alt="{{{ $user->first_name.' '.$user->last_name }}}"/></div>
                        <div class="pull-right"><h5>{{ trans('admin::dashboard.howdy', array('user'=>e($user->first_name))) }}</h5><small><span>{{{ $user->email }}}</span></small></div>
                    </a>
                </li>
                <li class="userlinks">
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('admin.account') }}">{{ trans('admin::dashboard.account') }} <i class="pull-right fa fa-cog"></i></a></li>
                        <li><a href="http://vcs.sanis.lt/kursiniai/vukhf/wikis/home">Help <i class="pull-right fa fa-question-circle"></i></a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('admin.logout') }}" class="text-right">{{ trans('admin::login.log_out') }}</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown' id="woo"><i class="fa fa-bell"></i><span class="badge">3</span></a>
            <ul class="dropdown-menu notifications arrow" id="woo2">
                <li class="dd-header">
                    <span>You have 3 new notification(s)</span>
                    <span><a href="#">Mark all Seen</a></span>
                </li>
                <div class="scrollthis">
                    <li>
                        <a href="#" class="notification-user active">
                            <span class="time">4 mins</span>
                            <i class="fa fa-user"></i>
                            <span class="msg">New user Registered. </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-danger active">
                            <span class="time">20 mins</span>
                            <i class="fa fa-bolt"></i>
                            <span class="msg">CPU at 92% on server#3! </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-success active">
                            <span class="time">1 hr</span>
                            <i class="fa fa-check"></i>
                            <span class="msg">Server#1 is live. </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-warning">
                            <span class="time">2 hrs</span>
                            <i class="fa fa-exclamation-triangle"></i>
                            <span class="msg">Database overloaded. </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-order">
                            <span class="time">10 hrs</span>
                            <i class="fa fa-shopping-cart"></i>
                            <span class="msg">New order received. </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-failure">
                            <span class="time">12 hrs</span>
                            <i class="fa fa-times-circle"></i>
                            <span class="msg">Application error!</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-fix">
                            <span class="time">12 hrs</span>
                            <i class="fa fa-wrench"></i>
                            <span class="msg">Installation Succeeded.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="notification-success">
                            <span class="time">18 hrs</span>
                            <i class="fa fa-check"></i>
                            <span class="msg">Account Created. </span>
                        </a>
                    </li>
                </div>
                <li class="dd-footer"><a href="#">View All Notifications</a></li>
            </ul>
        </li>
        <li>
            <a href="#" id="headerbardropdown"><span><i class="fa fa-level-down"></i></span></a>
        </li>

    </ul>
</header>