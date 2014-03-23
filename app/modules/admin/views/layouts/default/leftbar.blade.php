<!-- BEGIN SIDEBAR MENU -->
<ul class="acc-menu" id="sidebar">

    <li class="active"><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="divider"></li>
    <li><a href="javascript:;"><i class="fa fa-briefcase"></i> <span>Extras</span> <span class="badge badge-danger">1</span></a>
        <ul class="acc-menu">
            <li><a href="extras-signupform.htm">Sign Up</a></li>
            <li><a href="extras-404.htm">404 Page</a></li>
            <li><a href="extras-500.htm">500 Page</a></li>
            <li><a href="extras-login.htm">Login 1</a></li>
            <li><a href="extras-login2.htm">Login 2</a></li>
            <li><a href="extras-forgotpassword.htm">Password Reset</a></li>
            <li><a href="extras-blank.htm">Blank Page</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-sitemap"></i> <span>Unlimited Level Menu</span></a>
        <ul class="acc-menu">
            <li><a href="javascript:;">Menu Item 1</a></li>
            <li><a href="javascript:;">Menu Item 2</a>
                <ul class="acc-menu">
                    <li><a href="javascript:;">Menu Item 2.1</a></li>
                    <li><a href="javascript:;">Menu Item 2.2</a>
                        <ul class="acc-menu">
                            <li><a href="javascript:;">Menu Item 2.2.1</a></li>
                            <li><a href="javascript:;">Menu Item 2.2.2</a>
                                <ul class="acc-menu">
                                    <li><a href="javascript:;">And deeper yet!</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<!-- END SIDEBAR MENU -->