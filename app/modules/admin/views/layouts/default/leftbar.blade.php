<!-- BEGIN SIDEBAR MENU -->
<ul class="acc-menu" id="sidebar">

    <li><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="divider"></li>
    <li><a href="javascript:;"><i class="fa fa-rss-square"></i> <span>Levels</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">List levels</a></li>
            <li><a href="/news.html">Create new</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-file"></i> <span>Suggestions</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">List suggestions</a></li>
            <li><a href="/news.html">Create suggestion</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-book"></i> <span>Logs</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">View logs</a></li>
            <li><a href="/news.html">Empty all logs</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-user"></i> <span>Users & Groups</span></a>
        <ul class="acc-menu">
            <li><a href="{{ URL::route('admin.user.list') }}">List users</a></li>
            <li><a href="{{ URL::route('admin.user.add') }}">Create new user</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="{{ URL::route('admin.group.list') }}">List groups</a></li>
            <li><a href="{{ URL::route('admin.group.add') }}">Create new group</a></li>
        </ul>
    </li>
</ul>
<!-- END SIDEBAR MENU -->