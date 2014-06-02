<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="{{ trans('admin::dashboard.toggle_sidebar') }}"></a>

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
                        <li><a href="https://github.com/sanis/khf-t2h/wiki">Help <i class="pull-right fa fa-question-circle"></i></a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('admin.logout') }}" class="text-right">{{ trans('admin::login.log_out') }}</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</header>